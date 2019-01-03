<div class="row justify-content-center">
    <div class="col-md-8 text-center">

        @if(!$errors->isEmpty())
            <div class="card">
                <div class="card-body">
                    @foreach($errors->all() as $error)
                        <label class="text-danger"> * {{$error}} <br/></label>
                    @endforeach
                </div>
            </div>
        @endif

        @if(Session::has('alert-success'))
            <script>
                alert('Successfully Added');
            </script>
        @elseif(Session::has('alert-failed'))
            <script>
                alert('Failed');
            </script>
        @endif

        
        @if(isset($edit))
            <form action="" method="POST" id="caterer-edit-form" class="form" enctype="multipart/form-data">
        @else
            <form action="" method="POST" id="caterer-form" class="form" enctype="multipart/form-data">
        @endif
            @csrf
            <div class="row form-group">
                <div class="col-md-3 text-left col-form-label">
                    <label>Item Name</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="item_name" name="item_name" 
                    @if(isset($edit))
                        value="{{$serviceData[0]->item_name}}"
                    @endif
                    required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3 text-left col-form-label">
                    <label>Item Dine Time</label>
                </div>
                <div class="col-md-6 text-left">
                    <label class="radio radio-control">
                        <input type="radio" name="item_dine_time" value="breakfast" 
                        @if(isset($edit))
                            @if($serviceData[0]->item_dine_time === 1)
                                checked
                            @endif
                        @else
                            checked
                        @endif
                        required> Breakfast
                    </label>
                    &nbsp;
                    <label class="radio radio-control">
                        <input type="radio" name="item_dine_time" value="lunch"
                        @if(isset($edit))
                            @if($serviceData[0]->item_dine_time === 2)
                                checked
                            @endif
                        @endif
                        required> Lunch
                    </label>
                    &nbsp;
                    <label class="radio radio-control">
                        <input type="radio" name="item_dine_time" value="dinner"
                        @if(isset($edit))
                            @if($serviceData[0]->item_dine_time === 3)
                                checked
                            @endif
                        @endif
                        required> Dinner
                    </label>
                </div>
            </div>
            <div class="row form-group">
                    <div class="col-md-3 text-left col-form-label">
                        <label>Item Category</label>
                    </div>
                    <div class="col-md-6 text-left">
                        <label class="radio radio-control">
                            <input type="radio" name="item_category" value="started"
                            @if(isset($edit))
                                @if($serviceData[0]->item_category === "starter")
                                    checked
                                @endif
                            @else
                                checked
                            @endif
                            required> Starter
                        </label>
                        &nbsp;
                        <label class="radio radio-control">
                            <input type="radio" name="item_category" value="maincourse"
                            @if(isset($edit))
                                @if($serviceData[0]->item_category === "maincourse")
                                    checked
                                @endif
                            @endif
                            required> Main Course
                        </label>
                        &nbsp;
                        <label class="radio radio-control">
                            <input type="radio" name="item_category" value="desserts"
                            @if(isset($edit))
                                @if($serviceData[0]->item_category === "desserts")
                                    checked
                                @endif
                            @endif
                            required> Desserts
                        </label>
                    </div>
                </div>
            <div class="row form-group">
                <div class="col-md-3 text-left col-form-label">
                    <label>Item Description</label>
                </div>
                <div class="col-md-6">
                    <textarea class="form-control" cols="5" rows="5" id="item_description" name="item_description" required>@if(isset($edit)){{trim($serviceData[0]->item_description)}}@endif</textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3 text-left col-form-label">
                    <label>Item Picture</label>
                </div>
                <div class="col-md-6 text-left">
                    <input type="file" accept="image/jpg" id="item_picture" name="item_picture" 
                    @if(isset($edit))
                    @else
                        required
                    @endif
                    />
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3 text-left col-form-label">
                    <label>Item Price</label>
                </div>
                <div class="col-md-6 text-left">
                    <input class="form-control" type="text" id="item_price"
                    @if(isset($edit))
                        value="{{$serviceData[0]->item_price}}"
                    @endif
                    name="item_price"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-1 offset-3">
                    <input class="btn btn-success" type="submit" id="submit" value="Submit" name="submit" />
                </div>
                <div class="col-md-1 ml-5">
                    <input class="btn" type="reset" id="reset" value="Reset" name="submit"/>
                </div>
            </div>
        </form>
    </div>
</div>