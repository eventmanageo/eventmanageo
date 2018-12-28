<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Vendor;
use App\DineTime;
use App\CatererItem;
use App\PackageCaterer;
use App\PackageCatererItem;
use App\PackageMakeupItem;
use App\PackageMakeup;
use App\LandService;
use App\MakeupItem;
use App\CompanyDetails;

class VendorController extends Controller
{
    public function __contruct(){
        $this->middleware('auth:vendor');
    }
    
    public function saveVendorCompanyDetails(Request $request,$vendorType){
        $this->validate($request,[
            'comapny_name' => ['required','string','max:1000','min:3'],
            'company_email' => ['required','string','email'],
            'company_description' => ['required','string'],
            'company_contact_no' => ['required','string','min:10','max:10'],
        ],
        [
            'company_name.required' => 'Required',
            'company_name.max' => 'Maximum allowed characters 1000',
            'company_name.min' => 'Minimum allowed character 3',
            'company_email.required' => 'Required',
            'company_description.required' => 'Required',
            'company_contact_no.required' => 'Required',
            'company_contact_no.min' => 'Should be of 10 digit only.',
            'company_contact_no.max' => 'Should be of 10 digit only.',
        ]);

        $vendor_email = Session::get('vendor_email');
        $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

        $company_details_present = CompanyDetails::where('vendor_id',$vendor_id)->first();
        if($company_details_present != null){
            //Comapany Details already present
            $request->session()->flash('alert-present','Company Details Already Present');
            return back();
        }else{
            //Comapany Details donot present
            $company_details = new CompanyDetails();
            $company_details->vendor_id = $vendor_id;
            $company_details->company_name = $request['comapny_name'];
            $company_details->company_description = $request['company_description'];
            $company_details->company_email = $request['company_email'];
            $company_details->company_contact_no = $request['company_contact_no'];

            if($company_details->save()){
                $request->session()->flash('alert-success','Company Details Added');
                return back();
            }else{
                $request->session()->flash('alert-failed','Failed');
                return back();
            }
        }
    }

    public function saveVendorService(Request $request,$vendorType){
        if($vendorType==="caterer"){

            $this->validate($request,[
                'item_name' => ['required','max:200','min:3'],
                'item_dine_time' => ['required','in:breakfast,lunch,dinner'],
                'item_category' => ['required','in:started,maincourse,desserts'],
                'item_description' => ['required','max:1000'],
                'item_picture' => ['required','max:10000','mimes:jpeg,png,jpg'],
                'item_price' => ['required'],
            ],
            [
                'item_name.max' => 'Maximum allowed character 200',
                'item_name.required' => 'Required',
                'item_dine_time.required' => 'Required',
                'item_dine_time.in' => 'Should be in Breakfast/Lunch/Dinner',
                'item_category.required' => 'Required',
                'item_category.in' => 'Should be in Starter/MainCourse/Desserts',
                'item_description.required' => 'Required',
                'item_description.max' => 'Maximum allowed character 1000',
                'item_picture.required' => 'Required',
                'item_picture.max' => 'Maximum file size allowed 10000Kb',
                'item_price.required' => 'Required',
            ]);

            if($this->saveIntoCatererItemTable($request)){
                $request->session()->flash('alert-success','Item Added Successfully');
                return redirect()->back();
            }else{
                $request->session()->flash('alert-failed','Failed');
                return redirect()->back();
            }
        }elseif($vendorType === "land"){
            $this->validate($request,
            [
                'land_name' => ['required','max:200','min:3'],
                'land_description' => ['required','max:1000'],
                'land_picture' => ['required','max:10000','mimes:jpeg,png,jpg'],
                'land_price' => ['required'],
                'land_address' => ['required','max:1000'],
            ],
            [
                'land_name.required' => 'Required',
                'land_name.max' => 'Maximum allowed character 200',
                'land_name.min' => 'Minimum allowed character 3',
                'land_description.required' => 'Required',
                'land_description.max' => 'Maximum allowed character 1000',
                'land_picture.required' => 'Required',
                'land_picture.max' => 'Maximum file size allowed 10000Kb',
                'land_price.required' => 'Required',
                'land_address.required' => 'Required',
                'land_address.max' => 'Maximum allowed character 1000',
            ]
            );

            if($this->saveIntoLandService($request)){
                $request->session()->flash('alert-success','Item Added Successfully');
                return redirect()->back();
            }else{
                $request->session()->flash('alert-failed','Failed');
                return redirect()->back();
            }
        }elseif($vendorType === "makeup"){
            $this->validate($request,
            [
                'item_name' => ['required','max:200','min:3'],
                'item_description' => ['required','max:1000'],
                'item_picture' => ['required','max:10000','mimes:jpeg,png,jpg'],
                'item_price' => ['required'],
            ],
            [
                'item_name.required' => 'Required',
                'item_name.max' => 'Maximum allowed character 200',
                'item_name.min' => 'Minimum allowed character 3',
                'item_description.required' => 'Required',
                'item_description.max' => 'Maximum allowed character 1000',
                'item_picture.required' => 'Required',
                'item_picture.max' => 'Maximum file size allowed 10000Kb',
                'item_price.required' => 'Required',
            ]
            );

            if($this->saveIntoMakeupItemTable($request)){
                $request->session()->flash('alert-success','Item Added Successfully');
                return redirect()->back();
            }else{
                $request->session()->flash('alert-failed','Failed');
                return redirect()->back();
            }
        }
    }

    public function saveIntoCatererItemTable($inputtedData){
        $vendor_email = Session::get('vendor_email');
        $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

        $item_dine_time = $inputtedData->item_dine_time;
        $dineTimeId = DineTime::where('dine_name','=',$item_dine_time)->first()->id;

        $caterer_items = new CatererItem();
        $caterer_items->item_name = $inputtedData->item_name;
        $caterer_items->item_description = $inputtedData->item_description;
        $caterer_items->item_dine_time = $dineTimeId;
        $caterer_items->item_category = $inputtedData->item_category;
        $caterer_items->item_price = $inputtedData->item_price;
        $caterer_items->item_picture = $inputtedData->item_picture;
        $caterer_items->vendor_id = $vendor_id;

        if($caterer_items->save()){
            return true;
        }else{
            return false;
        }
    }

    public function saveIntoLandService($inputtedData){
        $vendor_email = Session::get('vendor_email');
        $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

        $land_service = new LandService();
        $land_service->land_name = $inputtedData->land_name;
        $land_service->land_description = $inputtedData->land_description;
        $land_service->land_picture = $inputtedData->land_picture;
        $land_service->land_price = $inputtedData->land_price;
        $land_service->land_address = $inputtedData->land_address;
        $land_service->vendor_id = $vendor_id;

        if($land_service->save()){
            return true;
        }else{
            return false;
        }
    }

    public function saveIntoMakeupItemTable($inputtedData){
        $vendor_email = Session::get('vendor_email');
        $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

        $makeup_items = new MakeupItem();
        $makeup_items->item_name = $inputtedData->item_name;
        $makeup_items->item_description = $inputtedData->item_description;
        $makeup_items->item_price = $inputtedData->item_price;
        $makeup_items->item_picture = $inputtedData->item_picture;
        $makeup_items->vendor_id = $vendor_id;

        if($makeup_items->save()){
            return true;
        }else{
            return false;
        }
    }

    public function goToMakePackageWithData($vendorType,$dinetime=null){
        $data;
        if($dinetime===null){
            $data = array("dinetime" => $dinetime, 'vendortype' => $vendorType);
        }else{
            $data = array('vendortype' => $vendorType);
        }
        if($vendorType === "caterer"){
            if($dinetime!=null){
                $vendor_email = Session::get('vendor_email');
                $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

                $dineTimeId = DineTime::where('dine_name','=',$dinetime)->first()->id;
                $matchThese = ['vendor_id' => $vendor_id , 'item_dine_time' => $dineTimeId];
                $items = CatererItem::where($matchThese)->get();
                $data['items'] = $items;

                return view('vendor.packages.package')->with('data',$data);
            }else {
                return redirect()->to('vendor');
            }
        }elseif($vendorType==="makeup"){
            $vendor_email = Session::get('vendor_email');
            $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

            $matchThese = ['vendor_id' => $vendor_id];
            $items = MakeupItem::where($matchThese)->get();
            $data['items'] = $items;
            return view('vendor.packages.package')->with('data',$data);
        }else{
            return view('vendor.packages.package')->with('data',$data);
        }
    }

    public function redirectToService(Request $request,$vendorType){
        return view('vendor.services.service')->with('vendortype',$vendorType);
    }

    public function savePackage(Request $request){
        $myObj = $request->mydata;
        $vendorType = $myObj['vendorType'];

        if($vendorType==="caterer"){
            $dinetime = $myObj['dinetime'];
            $packageName = $myObj['packageName'];
            $packageDescription = $myObj['packageDescription'];
            $packagePrice = $myObj['packagePrice'];
            $itemArray = $myObj['items'];
            $dineTimeId = DineTime::where('dine_name','=',$dinetime)->first()->id;

            $vendor_email = Session::get('vendor_email');
            $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

            $packageCaterer = new PackageCaterer();
            $packageCaterer->vendor_id = $vendor_id;
            $packageCaterer->package_name = $packageName;
            $packageCaterer->package_description = $packageDescription;
            $packageCaterer->package_price = $packagePrice;
            $packageCaterer->package_dine_time = $dineTimeId;

            if($packageCaterer->save()){
                $obj =  new \stdClass();
                $obj->status = "1";

                $objFailed =  new \stdClass();
                $objFailed->status = "0";

                $booleanStatus = false;

                $packageId = $packageCaterer->id;   

                foreach($itemArray as $item){
                    $packageCatererItem = new PackageCatererItem();
                    $packageCatererItem->package_id = $packageId;
                    $packageCatererItem->item_id = $item;

                    if($packageCatererItem->save()){
                        $booleanStatus = true;
                    }
                }

                if($booleanStatus){
                    return json_encode($obj);
                }else{
                    return json_encode($objFailed);
                }
            }else{
                return json_encode($objFailed);
            }
        }elseif($vendorType==="makeup"){
            $packageName = $myObj['packageName'];
            $packageDescription = $myObj['packageDescription'];
            $packagePrice = $myObj['packagePrice'];
            $itemArray = $myObj['items'];

            $vendor_email = Session::get('vendor_email');
            $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

            $packageMakeup = new PackageMakeup();
            $packageMakeup->vendor_id = $vendor_id;
            $packageMakeup->package_name = $packageName;
            $packageMakeup->package_description = $packageDescription;
            $packageMakeup->package_price = $packagePrice;

            if($packageMakeup->save()){
                $obj =  new \stdClass();
                $obj->status = "1";

                $objFailed =  new \stdClass();
                $objFailed->status = "0";

                $booleanStatus = false;

                $packageId = $packageMakeup->id;   

                foreach($itemArray as $item){
                    $packageMakeupItem = new PackageMakeupItem();
                    $packageMakeupItem->package_id = $packageId;
                    $packageMakeupItem->item_id = $item;

                    if($packageMakeupItem->save()){
                        $booleanStatus = true;
                    }
                }

                if($booleanStatus){
                    return json_encode($obj);
                }else{
                    return json_encode($objFailed);
                }
            }else{
                return json_encode($objFailed);
            }
        }
    }
}
