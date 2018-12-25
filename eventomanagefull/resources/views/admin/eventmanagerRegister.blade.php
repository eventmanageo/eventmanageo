@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><label><b>Event Manager Registration</b></label></div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right">
                                <label>Name :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="name" name="name" class="form-control" required/>
                            </div>
                            <div class="col-md-4 col-form-label">
                                @if($errors->has('name'))
                                    <label class="text-danger text-md-right">
                                        {{$errors->first('name')}}
                                    </label>
                                @else
                                <label class="text-success text-md-right">
                                        *Write full name.
                                    @endif
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right">
                                <label>E-mail :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="email" id="email" name="email" class="form-control" required/>
                            </div>
                            <div class="col-md-4 col-form-label">
                                @if($errors->has('email'))
                                    <label class="text-danger text-md-right">
                                        {{$errors->first('email')}}
                                    </label>
                                @else
                                    <label class="text-success text-md-right">*Should not match previous one's.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right">
                                <label>Password :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="password" id="password" name="password" class="form-control" required/>
                            </div>
                            <div class="col-md-4 col-form-label">
                                    @if($errors->has('password'))
                                    <label class="text-danger text-md-right">
                                        {{$errors->first('password')}}
                                    </label>
                                @else
                                <label class="text-success text-md-right">
                                        *Should be kept secret.
                                    @endif
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right">
                                <label>Confirm Password :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="confirm_password" name="password_confirmation" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="{{ __('Register') }}">
                            </div>
                            <div class="col-md-3 col-form-label">
                                @if(Session::has('alert-success'))
                                    <label class="text-success">{{Session::get('alert-success')}} | {{Session::get('alert')}} </label>
                                @endif
                                @if(Session::has('alert-danger'))
                                    <label class="text-danger">{{Session::get('alert-danger')}} | {{Session::get('alert')}} </label>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection