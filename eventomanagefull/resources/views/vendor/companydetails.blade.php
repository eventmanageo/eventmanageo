@extends('layouts.header_v')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><label><b>{{Session::get('vendor_category')}}'s Company Details</b></label></div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right">
                                <label>Company Name :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="comapny_name" name="comapny_name" class="form-control" required/>
                            </div>
                            <div class="col-md-4 col-form-label">
                                @if($errors->has('comapny_name'))
                                    <label class="text-danger text-md-right">
                                        {{$errors->first('comapny_name')}}
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
                                <label>Company E-mail :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="email" id="company_email" name="company_email" class="form-control" required/>
                            </div>
                            <div class="col-md-4 col-form-label">
                                @if($errors->has('company_email'))
                                    <label class="text-danger text-md-right">
                                        {{$errors->first('company_email')}}
                                    </label>
                                @else
                                    <label class="text-success text-md-right">*Be it be email only.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right">
                                <label>Description :</label>
                            </div>
                            <div class="col-md-5">
                                <textarea cols="5" rows="5" class="form-control" name="company_description" id="company_description" required></textarea>
                            </div>
                            <div class="col-md-4 col-form-label">
                                    @if($errors->has('company_description'))
                                    <label class="text-danger text-md-right">
                                        {{$errors->first('company_description')}}
                                    </label>
                                @else
                                <label class="text-success text-md-right">
                                        *Should be brief and accurate.
                                    @endif
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right">
                                <label>Company Contact No.</label>
                            </div>
                            <div class="col-md-5">
                                <input type="tel" minlength="10" maxlength="10" id="company_contact_no" name="company_contact_no" class="form-control" required/>
                            </div>
                            <div class="col-md-4 col-form-label">
                                    @if($errors->has('company_contact_no'))
                                    <label class="text-danger text-md-right">
                                        {{$errors->first('company_contact_no')}}
                                    </label>
                                @else
                                <label class="text-success text-md-right">
                                        *Should be of 10 digit.
                                    @endif
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="{{ __('Submit') }}">
                            </div>
                            <div class="col-md-3 col-form-label">
                                @if(Session::has('alert-success'))
                                    <label class="text-success">{{Session::get('alert-success')}} </label>
                                @endif
                                @if(Session::has('alert-present'))
                                    <label class="text-danger">{{Session::get('alert-present')}}</label>
                                @endif
                                @if(Session::has('alert-failed'))
                                    <label class="text-danger">{{Session::get('alert-failed')}}</label>
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