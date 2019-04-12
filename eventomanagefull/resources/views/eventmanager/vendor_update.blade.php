@extends('layouts.header_m')

@section('content')



<div class="container" id="register_vendor_con">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div >
                <h3 style="text-align: center; margin-top:20px"><b>Vendor Details Modified</b></h3>
                 {{ isset($url) ? ucwords($url) : ""}}</div>

                <div class="card-body">
                    <form method="POST" action = "/edit/<?php echo $users[0]->id; ?>">
                    
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value = '<?php echo$users[0]->email; ?>'  required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value = '<?php echo$users[0]->contact; ?>' required >

                                @if ($errors->has('contact'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">                                
                                <select id="category" class="form-control{{ $errors->has('category') ? 'is-valid' : ''}}" name="category" required>
                                    <option selected disabled value="">--Select Category--</option>
                                    <option value="caterer">Caterer</option>
                                    <option value="makeup">Make-up</option>
                                    <option value="transport">Transport</option>
                                    <option value="photographer">Photographer</option>
                                    <option value="decorator">Decorator</option>
                                    <option value="land">Land/Plot/Area</option>
                                    <option value="sound">Sound/DJ</option>
                                </select>

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" cols="5" rows="5" style="resize:none;" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value = '<?php echo$users[0]->address; ?>' required ></textarea>
                               

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-info" value = "Update vendors">Update Vendor</button>
                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection