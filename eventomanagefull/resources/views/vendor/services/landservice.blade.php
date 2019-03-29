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
        <form action="" method="POST" class="form" enctype="multipart/form-data">
        @else
        <form action="" method="POST" class="form" enctype="multipart/form-data">
        @endif
            @csrf
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-md-3 text-left col-form-label">
                            <label>Land Name</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="land_name" name="land_name" required @if(isset($edit)) value="{{$serviceData[0]->land_name}} @endif"/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-left col-form-label">
                            <label>Land Description</label>
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control" cols="5" rows="5" id="land_description" name="land_description" required>@if(isset($edit)){{$serviceData[0]->land_description}}@endif</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-left col-form-label">
                            <label>Land Picture</label>
                        </div>
                        <div class="col-md-6 text-left">
                            <input type="file" accept="image/jpg" id="land_picture" name="land_picture" @if(!isset($edit)) required @endif/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-left col-form-label">
                            <label>Land Price</label>
                        </div>
                        <div class="col-md-6 text-left">
                            <input class="form-control" type="text" id="land_price" name="land_price" required @if(isset($edit)) value="{{$serviceData[0]->land_price}}" @endif/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-left col-form-label">
                            <label>Land Location/Address</label>
                        </div>
                        <div class="col-md-6 text-left">
                            <textarea class="form-control" cols="5" rows="5" id="land_address" name="land_address" required>@if(isset($edit)){{$serviceData[0]->land_address}}@endif</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1 offset-3">
                            <input class="btn btn-success" type="submit" id="submit" value="Submit" name="submit"/>
                        </div>
                        <div class="col-md-1 ml-5">
                            <input class="btn" type="reset" id="submit" value="Reset" name="submit"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>