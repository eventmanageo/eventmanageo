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

        <form action="" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-md-3 text-left col-form-label">
                            <label>Vehicle Name</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" required/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-left col-form-label">
                            <label>Vehicle Description</label>
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control" cols="5" rows="5" id="vehicle_description" name="vehicle_description" required></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-left col-form-label">
                            <label>Vehicle Picture</label>
                        </div>
                        <div class="col-md-6 text-left">
                            <input type="file" accept="image/jpg" id="vehicle_picture" name="vehicle_picture" required/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-left col-form-label">
                            <label>Vehicle Price</label>
                        </div>
                        <div class="col-md-6 text-left">
                            <input class="form-control" type="text" id="vehicle_price" name="vehicle_price" required/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-left col-form-label">
                            <label>Vehicle Type</label>
                        </div>
                        <div class="col-md-6 text-left">
                            <label class="radio radio-control">
                                <input type="radio" name="vehicle_type" value="ac" checked required> AC
                            </label>
                            &nbsp;
                            <label class="radio radio-control">
                                <input type="radio" name="vehicle_type" value="nonac" required> Non AC
                            </label>
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