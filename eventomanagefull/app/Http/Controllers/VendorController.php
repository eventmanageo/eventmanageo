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
use App\TransportService;
use App\DecoratorService;
use App\LandService;
use App\PhotographerService;
use App\PackagePhotographer;
use App\PackagePhotographerItem;
use App\MakeupItem;
use App\CompanyDetails;
use App\SoundService;
use Image;
use DB;

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
        }elseif($vendorType==="transport"){
            
            $this->validate($request,[
                'vehicle_name' => ['required','max:200','min:3'],
                'vehicle_type' => ['required','in:ac,nonac'],
                'vehicle_description' => ['required','max:1000'],
                'vehicle_picture' => ['required','max:10000','mimes:jpeg,png,jpg'],
                'vehicle_price' => ['required'],
            ],
            [
                'vehicle_name.max' => 'Maximum allowed character 200',
                'vehicle_name.required' => 'Required',
                'vehicle_type.required' => 'Required',
                'vehicle_type.in' => 'Should be in AC/Non-Ac',
                'vehicle_description.required' => 'Required',
                'vehicle_description.max' => 'Maximum allowed character 1000',
                'vehicle_picture.required' => 'Required',
                'vehicle_picture.max' => 'Maximum file size allowed 10000Kb',
                'vehicle_price.required' => 'Required',
            ]);

            if($this->saveIntoTransportService($request)){
                $request->session()->flash('alert-success','Item Added Successfully');
                return redirect()->back();
            }else{
                $request->session()->flash('alert-failed','Failed');
                return redirect()->back();
            }
        }elseif($vendorType==="decorator"){
            
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
            ]);

            if($this->saveIntoDecoratorService($request)){
                $request->session()->flash('alert-success','Item Added Successfully');
                return redirect()->back();
            }else{
                $request->session()->flash('alert-failed','Failed');
                return redirect()->back();
            }
        }elseif($vendorType==="photographer"){
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
            ]);

            if($this->saveIntoPhotographerService($request)){
                $request->session()->flash('alert-success','Item Added Successfully');
                return redirect()->back();
            }else{
                $request->session()->flash('alert-failed','Failed');
                return redirect()->back();
            }
        }elseif($vendorType==="sound"){
            $this->validate($request,
            [
                'service_name' => ['required','max:200','min:3'],
                'service_description' => ['required','max:1000'],
                'service_picture' => ['required','max:10000','mimes:jpeg,png,jpg'],
                'service_price' => ['required'],
                'service_type' => ['required','in:orchestra,dj'],

            ],
            [
                'service_name.required' => 'Required',
                'service_name.max' => 'Maximum allowed character 200',
                'service_name.min' => 'Minimum allowed character 3',
                'service_description.required' => 'Required',
                'service_description.max' => 'Maximum allowed character 1000',
                'service_picture.required' => 'Required',
                'service_picture.max' => 'Maximum file size allowed 10000Kb',
                'service_price.required' => 'Required',
                'service_type.required' => 'Required',
                'service_type.in' => 'Should be in Orchestra/Dj',
            ]);

            if($this->saveIntoSoundService($request)){
                $request->session()->flash('alert-success','Item Added Successfully');
                return redirect()->back();
            }else{
                $request->session()->flash('alert-failed','Failed');
                return redirect()->back();
            }
        }
    }

    public function saveIntoCatererItemTable($inputtedData){

        $image = $inputtedData->file('item_picture');
        /* $new_name_file = rand().'.'.$image->getClientOriginalExtension(); */
        /* $image->move(public_path("images"),$new_name_file); */
        $path = $this->resizeImage($image);

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
        $caterer_items->item_picture = $path;
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

        $image = $inputtedData->file('land_picture');
        $path = $this->resizeImage($image);

        $land_service = new LandService();
        $land_service->land_name = $inputtedData->land_name;
        $land_service->land_description = $inputtedData->land_description;
        $land_service->land_picture = $path;
        $land_service->land_price = $inputtedData->land_price;
        $land_service->land_address = $inputtedData->land_address;
        $land_service->vendor_id = $vendor_id;

        if($land_service->save()){
            return true;
        }else{
            return false;
        }
    }

    public function resizeImage($image){
        $rand = rand();
        $thumbnailImage = Image::make($image);
        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/images/';

        $thumbnailImage->save($originalPath.$rand.$image->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        $thumbnailImage->resize($thumbnailPath.$rand.$image->getClientOriginalName());

        $path = $rand.$image->getClientOriginalName();

        return $path;
    }

    public function saveIntoMakeupItemTable($inputtedData){
        $vendor_email = Session::get('vendor_email');
        $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

        $image = $inputtedData->file('item_picture');
        $path = $this->resizeImage($image);

        $makeup_items = new MakeupItem();
        $makeup_items->item_name = $inputtedData->item_name;
        $makeup_items->item_description = $inputtedData->item_description;
        $makeup_items->item_price = $inputtedData->item_price;
        $makeup_items->item_picture = $path;
        $makeup_items->vendor_id = $vendor_id;

        if($makeup_items->save()){
            return true;
        }else{
            return false;
        }
    }

    public function saveIntoTransportService($inputtedData){
        $vendor_email = Session::get('vendor_email');
        $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;
        
        $image = $inputtedData->file('vehicle_picture');
        $path = $this->resizeImage($image);

        $transport_service = new TransportService();
        $transport_service->vehicle_name = $inputtedData->vehicle_name;
        $transport_service->vehicle_description = $inputtedData->vehicle_description;
        $transport_service->vehicle_picture = $path;
        $transport_service->vehicle_price = $inputtedData->vehicle_price;
        $transport_service->vehicle_type = $inputtedData->vehicle_type;
        $transport_service->vendor_id = $vendor_id;

        if($transport_service->save()){
            return true;
        }else{
            return false;
        }
    }

    public function saveIntoDecoratorService($inputtedData){
        $vendor_email = Session::get('vendor_email');
        $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

        $image = $inputtedData->file('item_picture');
        $path = $this->resizeImage($image);

        $decorator_service = new DecoratorService();
        $decorator_service->item_name = $inputtedData->item_name;
        $decorator_service->item_description = $inputtedData->item_description;
        $decorator_service->item_picture = $path;
        $decorator_service->item_price = $inputtedData->item_price;
        $decorator_service->vendor_id = $vendor_id;

        if($decorator_service->save()){
            return true;
        }else{
            return false;
        }
    }

    public function saveIntoPhotographerService($inputtedData){
        $vendor_email = Session::get('vendor_email');
        $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

        $image = $inputtedData->file('item_picture');
        $path = $this->resizeImage($image);

        $photographer_service = new PhotographerService();
        $photographer_service->item_name = $inputtedData->item_name;
        $photographer_service->item_description = $inputtedData->item_description;
        $photographer_service->item_picture = $path;
        $photographer_service->item_price = $inputtedData->item_price;
        $photographer_service->vendor_id = $vendor_id;

        if($photographer_service->save()){
            return true;
        }else{
            return false;
        }
    }

    public function saveIntoSoundService($inputtedData){
        $vendor_email = Session::get('vendor_email');
        $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

        $image = $inputtedData->file('service_picture');
        $path = $this->resizeImage($image);

        $sound_service = new SoundService();
        $sound_service->service_name = $inputtedData->service_name;
        $sound_service->service_description = $inputtedData->service_description;
        $sound_service->service_picture = $path;
        $sound_service->service_price = $inputtedData->service_price;
        $sound_service->service_type = $inputtedData->service_type;
        $sound_service->vendor_id = $vendor_id;

        if($sound_service->save()){
            return true;
        }else{
            return false;
        }
    }

    public function goToMakePackageWithData($vendorType,$dinetime=null){
        $data;
        if($dinetime===null){
            $data = array('vendortype' => $vendorType);
        }else{
            $data = array("dinetime" => $dinetime, 'vendortype' => $vendorType);
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
        }elseif($vendorType==="photographer"){
            $vendor_email = Session::get('vendor_email');
            $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

            $matchThese = ['vendor_id' => $vendor_id];

            $items = PhotographerService::where($matchThese)->get();
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
            $packageFor = $myObj['packageFor'];
            $itemArray = $myObj['items'];

            $vendor_email = Session::get('vendor_email');
            $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

            $packageMakeup = new PackageMakeup();
            $packageMakeup->vendor_id = $vendor_id;
            $packageMakeup->package_name = $packageName;
            $packageMakeup->package_description = $packageDescription;
            $packageMakeup->package_price = $packagePrice;
            $packageMakeup->package_for = $packageFor;

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
        }elseif($vendorType==="photographer"){
            $packageName = $myObj['packageName'];
            $packageDescription = $myObj['packageDescription'];
            $packagePrice = $myObj['packagePrice'];
            $itemArray = $myObj['items'];

            $vendor_email = Session::get('vendor_email');
            $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;

            $packagePhotographer = new PackagePhotographer();
            $packagePhotographer->vendor_id = $vendor_id;
            $packagePhotographer->package_name = $packageName;
            $packagePhotographer->package_description = $packageDescription;
            $packagePhotographer->package_price = $packagePrice;

            if($packagePhotographer->save()){
                $obj =  new \stdClass();
                $obj->status = "1";

                $objFailed =  new \stdClass();
                $objFailed->status = "0";

                $booleanStatus = false;

                $packageId = $packagePhotographer->id;   

                foreach($itemArray as $item){
                    $packagePhotographerItem = new PackagePhotographerItem();
                    $packagePhotographerItem->package_id = $packageId;
                    $packagePhotographerItem->item_id = $item;

                    if($packagePhotographerItem->save()){
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

    public function showListServicePage(Request $request,$vendorType){
        $vendor_email = Session::get('vendor_email');
        $vendor_id = Vendor::where('email','=',$vendor_email)->first()->id;
        $returnData;
        if($vendorType==="caterer"){
            $catererItemWithDineTime = DB::table('caterer_items')
            ->select('caterer_items.id','caterer_items.item_name','caterer_items.item_description',
            'caterer_items.item_category','caterer_items.item_price','caterer_items.item_picture','dine_times.dine_name')
            ->join('dine_times','dine_times.id','=','caterer_items.item_dine_time')
            ->where('caterer_items.vendor_id','=',$vendor_id);
            if($catererItemWithDineTime->get()->count() > 0){
                $returnData = $catererItemWithDineTime->get();
                return view('vendor.services.listcatererservices')->with('serviceBunch',$returnData)->with('vendorType',$vendorType);
            }else{
                return view('vendor.services.listcatererservices')->with('serviceBunch','Empty')->with('vendorType',$vendorType);
            }
        }elseif($vendorType==="transport"){
            $transportServices = DB::table('transport_services')
            ->select('transport_services.id','transport_services.vehicle_name','transport_services.vehicle_description',
            'transport_services.vehicle_price','transport_services.vehicle_type')
            ->where('transport_services.vendor_id','=',$vendor_id);
            if($transportServices->get()->count() > 0){
                $returnData = $transportServices->get();
                return view('vendor.services.listtransportservices')->with('serviceBunch',$returnData)->with('vendorType',$vendorType);
            }else{
                return view('vendor.services.listtransportservices')->with('serviceBunch','Empty')->with('vendorType',$vendorType);
            }
        }elseif($vendorType==="makeup"){
            $makeupItem = DB::table('makeup_items')
            ->select('id','item_name','item_description','item_price','item_picture')
            ->where('vendor_id','=',$vendor_id);
            if($makeupItem->get()->count() > 0 ){
                $returnData = $makeupItem->get();
                return view('vendor.services.listmakeupservices')->with('serviceBunch',$returnData)->with('vendorType',$vendorType);
            }else{
                return view('vendor.services.listmakeupservices')->with('serviceBunch','Empty')->with('vendorType',$vendorType);
            }
        }elseif($vendorType==="sound"){
            $soundItem = DB::table('sound_services')
            ->select('id','service_name','service_description','service_price','service_picture','service_type')
            ->where('vendor_id','=',$vendor_id);
            if($soundItem->get()->count() > 0){
                $returnData = $soundItem->get();
                return view('vendor.services.listsoundservices')->with('serviceBunch',$returnData)->with('vendorType',$vendorType);
            }else{
                return view('vendor.services.listsoundservices')->with('serviceBunch','Empty')->with('vendorType',$vendorType);
            }
        }elseif($vendorType==="decorator"){
            $decoratorItem = DB::table('decorator_services')
            ->select('id','item_name','item_description','item_price','item_picture')
            ->where('vendor_id','=',$vendor_id);
            if($decoratorItem->get()->count() > 0){
                $returnData = $decoratorItem->get();
                return view('vendor.services.listdecoratorservices')->with('serviceBunch',$returnData)->with('vendorType',$vendorType);
            }else{
                return view('vendor.services.listdecoratorservices')->with('serviceBunch','Empty')->with('vendorType',$vendorType);
            }
        }elseif($vendorType==="land"){
            $landItem = DB::table('land_services')
            ->select('id','land_name','land_description','land_price','land_picture')
            ->where('vendor_id','=',$vendor_id);
            if($landItem->get()->count() > 0){
                $returnData = $landItem->get();
                return view('vendor.services.listlandservices')->with('serviceBunch',$returnData)->with('vendorType',$vendorType);
            }else{
                return view('vendor.services.listlandservices')->with('serviceBunch','Empty')->with('vendorType',$vendorType);
            }
        }elseif($vendorType === "photographer"){
            $photographerItem = DB::table('photographer_services')
            ->select('id','item_name','item_description','item_picture','item_price')
            ->where('vendor_id','=',$vendor_id);
            if($photographerItem->get()->count() > 0){
                $returnData = $photographerItem->get();
                return view('vendor.services.listphotographerservices')->with('serviceBunch',$returnData)->with('vendorType',$vendorType);
            }else{
                return view('vendor.services.listphotographerservices')->with('serviceBunch','Empty')->with('vendorType',$vendorType);
            }
        }
    }

    public function deleteService(Request $request){
        if($request->vendorType === "caterer"){
            if(CatererItem::where('id',$request->id)->delete()){
                $request->session()->flash('status-success','Success');
                return redirect()->back();
            }else{
                $request->session()->flash('status-failed','Failed');
                return redirect()->back();
            }
        }elseif($request->vendorType === "transport"){
            if(TransportService::where('id',$request->id)->delete()){
                $request->session()->flash('status-success','Success');
                return redirect()->back();
            }else{
                $request->session()->flash('status-failed','Failed');
                return redirect()->back();
            }
        }elseif($request->vendorType === "makeup"){
            if(MakeupItem::where('id',$request->id)->delete()){
                $request->session()->flash('status-success','Success');
                return redirect()->back();
            }else{
                $request->session()->flash('status-failed','Failed');
                return redirect()->back();
            }
        }elseif($request->vendorType === "sound"){
            if(SoundService::where('id',$request->id)->delete()){
                $request->session()->flash('status-success','Success');
                return redirect()->back();
            }else{
                $request->session()->flash('status-failed','Failed');
                return redirect()->back();
            }
        }elseif($request->vendorType === "decorator"){
            if(DecoratorService::where('id',$request->id)->delete()){
                $request->session()->flash('status-success','Success');
                return redirect()->back();
            }else{
                $request->session()->flash('status-failed','Failed');
                return redirect()->back();
            }
        }elseif($request->vendorType === "land"){
            if(LandService::where('id',$request->id)->delete()){
                $request->session()->flash('status-success','Success');
                return redirect()->back();
            }else{
                $request->session()->flash('status-failed','Failed');
                return redirect()->back();
            }
        }elseif($request->vendorType === "photographer"){
            if(PhotographerService::where('id',$request->id)->delete()){
                $request->session()->flash('status-success','Success');
                return redirect()->back();
            }else{
                $request->session()->flash('status-failed','Failed');
                return redirect()->back();
            }
        }
    }

    public function editServiceShowFormwithData(Request $request,$id,$vendorType){
        
        if($vendorType === "caterer"){
            $catererItemWithDineTime = DB::table('caterer_items')
            ->select('id','item_name','item_description','item_dine_time',
            'item_category','item_price','item_picture')
            ->where('id','=',$id);
            if($catererItemWithDineTime->get()->count() > 0){
                $returnData = $catererItemWithDineTime->get();
                return view('vendor.services.service')->with('vendortype',$vendorType)->with('serviceData',$returnData)->with('edit','yes');
            }
        }elseif($vendorType==="photographer"){
            $photographerItem = DB::table('photographer_services')
            ->select('id','item_name','item_description','item_picture','item_price')
            ->where('id','=',$id);
            if($photographerItem->get()->count() > 0){
                $returnData = $photographerItem->get();
                return view('vendor.services.service')->with('vendortype',$vendorType)->with('serviceData',$returnData)->with('edit','yes');
            }
        }elseif($vendorType === "sound"){
            $soundItem = DB::table('sound_services')
            ->select('id','service_name','service_description','service_picture','service_price','service_type')
            ->where('id','=',$id);
            if($soundItem->get()->count() > 0){
                $returnData = $soundItem->get();
                return view('vendor.services.service')->with('vendortype',$vendorType)->with('serviceData',$returnData)->with('edit','yes');
            }
        }elseif($vendorType === "land"){
            $landItem = DB::table('land_services')
            ->select('id','land_name','land_description','land_picture','land_price','land_address')
            ->where('id','=',$id);
            if($landItem->get()->count() > 0){
                $returnData = $landItem->get();
                return view('vendor.services.service')->with('vendortype',$vendorType)->with('serviceData',$returnData)->with('edit','yes');
            }
        }elseif($vendorType === "decorator"){
            $decoratorItem = DB::table('decorator_services')
            ->select('id','item_name','item_description','item_picture','item_price')
            ->where('id','=',$id);
            if($decoratorItem->get()->count() > 0){
                $returnData = $decoratorItem->get();
                return view('vendor.services.service')->with('vendortype',$vendorType)->with('serviceData',$returnData)->with('edit','yes');
            }
        }elseif($vendorType === "makeup"){
            $makeupItem = DB::table('makeup_items')
            ->select('id','item_name','item_description','item_picture','item_price')
            ->where('id','=',$id);
            if($makeupItem->get()->count() > 0){
                $returnData = $makeupItem->get();
                return view('vendor.services.service')->with('vendortype',$vendorType)->with('serviceData',$returnData)->with('edit','yes');
            }
        }elseif($vendorType === "transport"){
            $makeupItem = DB::table('transport_services')
            ->select('id','vehicle_name','vehicle_description','vehicle_picture','vehicle_price','vehicle_type')
            ->where('id','=',$id);
            if($makeupItem->get()->count() > 0){
                $returnData = $makeupItem->get();
                return view('vendor.services.service')->with('vendortype',$vendorType)->with('serviceData',$returnData)->with('edit','yes');
            }
        }
    }

    public function editService(Request $request,$id,$vendorType){
        if($vendorType === "caterer"){
            $dinetime = $request->item_dine_time;
            $dineTimeId = DineTime::where('dine_name','=',$dinetime)->first()->id;
            if($request->hasFile('item_picture')){
                $image = $request->file('item_picture');
                $path = $this->resizeImage($image);

                $queryUpdate = DB::table('caterer_items')->where('id','=',$id)
                    ->update(['item_name' => $request->item_name ,
                    'item_description' => $request->item_description,
                    'item_dine_time' => $dineTimeId,
                    'item_category' => $request->item_category,
                    'item_price' => $request->item_price,
                    'item_picture' => $path
                    ]);
            }else{
                $queryUpdate = DB::table('caterer_items')->where('id','=',$id)
                    ->update(['item_name' => $request->item_name ,
                    'item_description' => $request->item_description,
                    'item_dine_time' => $dineTimeId,
                    'item_category' => $request->item_category,
                    'item_price' => $request->item_price
                    ]);
            }
            $request->session()->flash('status-edit-success','Success');
            return redirect()->route('listservice',['vendorType' => $vendorType]);
        }elseif($vendorType === "photographer"){

            if($request->hasFile('item_picture')){
                $image = $request->file('item_picture');
                $path = $this->resizeImage($image);

                $queryUpdate = DB::table('photographer_services')->where('id','=',$id)
                    ->update(['item_name' => $request->item_name ,
                    'item_description' => $request->item_description,
                    'item_price' => $request->item_price,
                    'item_picture' => $path
                    ]);
            }else{
                $queryUpdate = DB::table('photographer_services')->where('id','=',$id)
                    ->update(['item_name' => $request->item_name ,
                    'item_description' => $request->item_description,
                    'item_price' => $request->item_price
                    ]);
            }
            $request->session()->flash('status-edit-success','Success');
            return redirect()->route('listservice',['vendorType' => $vendorType]);
        }elseif($vendorType === "sound"){

            if($request->hasFile('service_picture')){
                $image = $request->file('service_picture');
                $path = $this->resizeImage($image);

                $queryUpdate = DB::table('sound_services')->where('id','=',$id)
                    ->update(['service_name' => $request->service_name ,
                    'service_description' => $request->service_description,
                    'service_price' => $request->service_price,
                    'service_picture' => $path,
                    'service_type' => $request->service_type
                    ]);
            }else{
                $queryUpdate = DB::table('sound_services')->where('id','=',$id)
                    ->update(['service_name' => $request->service_name ,
                    'service_description' => $request->service_description,
                    'service_price' => $request->service_price,
                    'service_type' => $request->service_type
                    ]);
            }
            $request->session()->flash('status-edit-success','Success');
            return redirect()->route('listservice',['vendorType' => $vendorType]);
        }elseif($vendorType === "land"){

            if($request->hasFile('land_picture')){
                $image = $request->file('land_picture');
                $path = $this->resizeImage($image);

                $queryUpdate = DB::table('land_services')->where('id','=',$id)
                    ->update(['land_name' => $request->land_name ,
                    'land_description' => $request->land_description,
                    'land_price' => $request->land_price,
                    'land_picture' => $path,
                    'land_address' => $request->land_address
                    ]);
            }else{
                $queryUpdate = DB::table('land_services')->where('id','=',$id)
                    ->update(['land_name' => $request->land_name ,
                    'land_description' => $request->land_description,
                    'land_price' => $request->land_price,
                    'land_address' => $request->land_address
                    ]);
            }
            $request->session()->flash('status-edit-success','Success');
            return redirect()->route('listservice',['vendorType' => $vendorType]);
        }elseif($vendorType === "decorator"){

            if($request->hasFile('item_picture')){
                $image = $request->file('item_picture');
                $path = $this->resizeImage($image);

                $queryUpdate = DB::table('decorator_services')->where('id','=',$id)
                    ->update(['item_name' => $request->item_name ,
                    'item_description' => $request->item_description,
                    'item_price' => $request->item_price,
                    'item_picture' => $path
                    ]);
            }else{
                $queryUpdate = DB::table('decorator_services')->where('id','=',$id)
                    ->update(['item_name' => $request->item_name ,
                    'item_description' => $request->item_description,
                    'item_price' => $request->item_price
                    ]);
            }
            $request->session()->flash('status-edit-success','Success');
            return redirect()->route('listservice',['vendorType' => $vendorType]);
        }elseif($vendorType === "makeup"){

            if($request->hasFile('item_picture')){
                $image = $request->file('item_picture');
                $path = $this->resizeImage($image);

                $queryUpdate = DB::table('makeup_items')->where('id','=',$id)
                    ->update(['item_name' => $request->item_name ,
                    'item_description' => $request->item_description,
                    'item_price' => $request->item_price,
                    'item_picture' => $path
                    ]);
            }else{
                $queryUpdate = DB::table('makeup_items')->where('id','=',$id)
                    ->update(['item_name' => $request->item_name ,
                    'item_description' => $request->item_description,
                    'item_price' => $request->item_price
                    ]);
            }
            $request->session()->flash('status-edit-success','Success');
            return redirect()->route('listservice',['vendorType' => $vendorType]);
        }elseif($vendorType === "transport"){

            if($request->hasFile('vehicle_picture')){
                $image = $request->file('vehicle_picture');
                $path = $this->resizeImage($image);

                $queryUpdate = DB::table('transport_services')->where('id','=',$id)
                    ->update(['vehicle_name' => $request->vehicle_name ,
                    'vehicle_description' => $request->vehicle_description,
                    'vehicle_price' => $request->vehicle_price,
                    'vehicle_picture' => $path,
                    'vehicle_type' => $request->vehicle_type
                    ]);
            }else{
                $queryUpdate = DB::table('transport_services')->where('id','=',$id)
                    ->update(['vehicle_name' => $request->vehicle_name ,
                    'vehicle_description' => $request->vehicle_description,
                    'vehicle_price' => $request->vehicle_price,
                    'vehicle_type' => $request->vehicle_type
                    ]);
            }
            $request->session()->flash('status-edit-success','Success');
            return redirect()->route('listservice',['vendorType' => $vendorType]);
        }
    }
}
