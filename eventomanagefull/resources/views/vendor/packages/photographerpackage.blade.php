<div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <label><strong>package making</strong></label>
            <br/>
            <label><strong>*</strong> Do not refresh page while adding into pacakge.</label>
            <br/>
            <label><strong>*</strong> Clicking on row delete the item from package.</label>
            <label><strong>*</strong> Add to Package : It make temporary list. | Submit Package : It uploads to database. </label>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-md-12 text-center">
            @if($data['items']->isEmpty())
                <label>It seems like you haven't added any items/services yet.</label>
                <a href="/{{Session::get('vendor_category')}}/add/service">Add your services</a>
            @else
                <input type="hidden" value="{{Session::get('vendor_category')}}" name="vendorType" id="vendorType"/>
                <div class="form-group row">
                    <div class="col-md-4 text-right col-form-label">
                        <label>Package Name</label>
                    </div>
                    <div class="col-md-4"> 
                        <input type="text" name="packagename" id="packagename" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 text-right col-form-label">
                        <label>Package Price</label>
                    </div>
                    <div class="col-md-4"> 
                        <input type="text" name="packageprice" id="packageprice" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 text-right col-form-label">
                        <label>Package Description</label>
                    </div>
                    <div class="col-md-4"> 
                        <textarea class="form-control" cols="5" rows="5" id="packagedescription" name="packagedescription"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 text-right col-form-label">
                        <label>Write into the box and add into package</label>
                    </div>
                    <div class="col-md-4 text-center">
                        <input list="itemlists" id="itemlist" name="itemlist" class="form-control" placeholder="Select">
                        <datalist id="itemlists">
                            @foreach ($data['items'] as $item)
                                <option value="{{$item->id}}" data-name="{{$item->item_name}}">{{$item->item_name}}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="addtopackage" value="Add to Package" class="btn btn-info"/>
                    </div>
                    <div class="col-md-2">
                        <input type="button" id="submitpackage" value="Submit Pacakge" class="btn btn-success"/>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <table id="itemsTable" class="table table-striped">
                <thead>
                    <tr>
                        <td>Item Id</td>
                        <td>Item Name</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
    
        $(document).ready(function(){
            itemname = "";
            var vendorType = $("#vendorType").val();
    
            var jsonObj = new Object();
            jsonObj.vendorType = vendorType;
    
            itemidArray = new Array();
    
            $("#itemlist").change(function(){
                var val = $("#itemlist").val();
                var itmName = $("#itemlists option").filter(function(){
                    return this.value == val;
                }).data('name');
                itemname = itmName ? '' +itmName : 'No Match';
            });
    
            $('#addtopackage').click(function(){
                var packagename = $("#packagename").val();
                var packagedescription = $("#packagedescription").val();
                var packageprice =$("#packageprice").val();
                if(packagename==="" || packagename===null || packagedescription==="" || packagedescription===null || packageprice==="" || packageprice===null){
                    alert('Package name or description should not be empty.');    
                }else{
                    if(itemname==="No Match"){
                        alert('Seems like we have no item name');
                    }else{
                        jsonObj.packageName = packagename;
                        jsonObj.packageDescription = packagedescription;
                        jsonObj.packagePrice = packageprice;
                        var itemIdText = $("#itemlist").val();
                        var itemid = parseInt(itemIdText,10);
                        var inArrayPresent = $.inArray(itemid,itemidArray);
                        if(inArrayPresent===-1){
                            itemidArray.push(itemid);
                            jsonObj.items = itemidArray;
                            $("table tbody").append("<tr><td>"+itemid+" </td><td>"+itemname+"</td></tr>");
                            itemname = "";
                            $("#itemlist").val("");
                        }else{
                            alert('Looks like item already added');
                            $("#itemlist").val("");
                        }
                    }
                }
                console.log(JSON.stringify(jsonObj));
            });
    
            $("#itemsTable").on("click","tbody tr",function(){
                var value = $(this).closest('tr').children('td:first').text();
                itemidArray.splice($.inArray(value,itemidArray));
                jsonObj.items = itemidArray;
    
                $(this).remove();
    
                console.log(JSON.stringify(jsonObj));
            });
    
            $("#submitpackage").click(function(){
    
                if(itemidArray.length===0){
                    alert('Cannot submit package with no items in it.')
                }else{
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type : 'POST',
                        url : '/saveToPacakage',
                        data : {_token: CSRF_TOKEN,mydata:jsonObj},
                        dataType : 'JSON',
                        success : function(response){
                            if(response.status === "1"){
                                alert('Success');
                                location.reload();
                            }else if (response.status === "0"){
                                alert('Failed');
                                location.reload();
                            }
                        }
                    });
                }   
            });
        });
    
    </script>