@extends('layouts.header_m')

@section('content')

<!-- Custom CSS -->
<style type="text/css">

.word-wrap{
  overflow-wrap: break-word;
}
.prod-body{
  height:300px;
}

.box:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.register-box{
  margin-top:20px;
}

</style>


<div class="" id="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div >
                <h3 style="text-align: center; margin-top:20px"><b>User Cart Details Modified</b></h3>
                 {{ isset($url) ? ucwords($url) : ""}}</div>

                <div class="card-body">
                    <form method="POST" action = "/edits/<?php echo $users[0]->id; ?>">
                    
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value = '<?php echo$users[0]->name; ?>'  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service_name" class="col-md-4 col-form-label text-md-right">{{ __('Service Name') }}</label>

                            <div class="col-md-6">
                                <input id="service_name" type="text" class="form-control{{ $errors->has('service_name') ? ' is-invalid' : '' }}" name="service_name" value = '<?php echo$users[0]->service_name; ?>'  required autofocus>

                                @if ($errors->has('service_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('service_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value = '<?php echo$users[0]->description; ?>' required  autofocus>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value = '<?php echo$users[0]->price; ?>' required >

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-info" value = "Update Cart">Update Cart</button>
                            </div><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection