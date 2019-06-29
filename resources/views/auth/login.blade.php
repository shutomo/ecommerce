@extends('layouts.auth')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div>
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title p-b-43">
                    LOGIN MEMBERSHIP
                    <hr>
                </span>
                
                @if ($errors->has('email'))
                    <strong style="color:red">{{ $errors->first('email') }}</strong>
                @endif
                
                @if ($errors->has('password'))
                    <strong style="color:red">{{ $errors->first('password') }}</strong>
                @endif
                <span class="label-input">Email</span>
                <div class="border rounded validate-input" data-validate = "Valid email is required: ex:gmail@sulistiyo.com">
                    <input id="email" type="email" {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  required autofocus>
                </div>
                
                <span class="label">Password</span>
                <div class="border rounded validate-input" data-validate="Password is required">
                    
                    <input id="password" type="password" {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    
                </div>
                <br>
                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact-form-checkbox">
                        <input class="input-checkbox" type="checkbox" name="remember" id="ckb1"> Remember Me
                    </div>

                    <div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
        

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
                <hr>
                <a href="{{ route('register') }}">
                    Doesn't have an account yet ?
                </a>
            </form>

            <div class="login100-more" style="background-image: url('https://www.bahrainthisweek.com/wp-content/uploads/2018/07/Volvo-Art-3.jpg');">
            </div>
        </div>
    </div>
</div>
@endsection
<!-- old below -->
<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->