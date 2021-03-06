@extends('layouts.app')

@section('content')
<div class="container" id="login_user_con">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>
                <div class="row">
                    <div class="col-md-4 offset-4 text-center">
                        <label class="form-label text-danger">{{ old('status-failed') }}</label>
                    </div>
                </div>
                <div class="card-body">
                    @isset($url)
                        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                        
                    @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @isset($url)    
                            @if($url=="admin" || $url=="eventmanager")
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                            @else
                                
                            <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                
                                <a class="btn btn-link" href="
                                    @isset($url)
                                        {{ url("$url/password/reset") }}
                                    @else
                                        {{ route("password.request") }}
                                    @endisset
                                ">
                                    {{ __('Forgot Your Password?') }}
                                </a>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}

                                @endif
                                @else
                                <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}

                                </button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                
                                <a class="btn btn-link" href="
                                    @isset($url)
                                        {{ url("$url/password/reset") }}
                                    @else
                                        {{ route("password.request") }}
                                    @endisset
                                ">
                                    {{ __('Forgot Your Password?') }}
                                </a>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}

                            @endisset
                                @isset($url) 
                                    @if($url=="admin" || $url=="eventmanager")

                                    @else
                                            <div style="margin-top:2%">
                                        New user?<a href="
                                            @isset($url)
                                                
                                                {{ url("register/$url") }}
                                            @else
                                                {{ route('register') }}
                                            @endisset
                                        "
                                        >click here</a>
                                        </div>
                                    @endif
                                @else
                                <div style="margin-top:2%">
                                        New user?<a href="
                                            @isset($url)
                                                {{ url("register/$url") }}
                                            @else
                                                {{ route('register') }}
                                            @endisset
                                        "
                                        >click here</a>
                                        </div>
                                @endisset
                                
                             
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
