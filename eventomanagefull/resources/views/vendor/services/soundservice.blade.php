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
                                <label>Service Name</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="service_name" name="service_name" required/>
                            </div>
                        </div>
                        <div class="row form-group">
                                <div class="col-md-3 text-left col-form-label">
                                    <label>Service Type</label>
                                </div>
                                <div class="col-md-6 text-left">
                                    <label class="radio radio-control">
                                        <input type="radio" name="service_type" value="orchestra" checked required> DJ
                                    </label>
                                    &nbsp;
                                    <label class="radio radio-control">
                                        <input type="radio" name="service_type" value="dj" required> Orchestra
                                    </label>
                                </div>
                            </div>
                        <div class="row form-group">
                            <div class="col-md-3 text-left col-form-label">
                                <label>Service Description</label>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" cols="5" rows="5" id="service_description" name="service_description" required></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3 text-left col-form-label">
                                <label>Service Picture</label>
                            </div>
                            <div class="col-md-6 text-left">
                                <input type="file" accept="image/jpg" id="service_picture" name="service_picture" required/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3 text-left col-form-label">
                                <label>Service Price</label>
                            </div>
                            <div class="col-md-6 text-left">
                                <input class="form-control" type="text" id="service_price" name="service_price"/>
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