@extends('layouts.auth')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div>
            <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title p-b-43">
                    Create an Account
                </span>
                
                @if ($errors->has('email'))
                    <strong style="color:red">{{ $errors->first('email') }}</strong>
                @endif
                
                @if ($errors->has('password'))
                    <strong style="color:red">{{ $errors->first('password') }}</strong>
                @endif
                @if ($errors->has('name'))
                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                @endif
                
                <span>Name</span>
                <div class="border rounded  validate-input">
                    <input id="name" type="text" {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>


                    <span class="focus-input100"></span>
                </div>

                <span>Email</span>
                <div class="border rounded validate-input" data-validate = "Valid email is required: ex:gmail@sulistiyo.com">
                    <input id="email" type="email" {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  required autofocus>


                    <span class="focus-input100"></span>
                    
                </div>
                
                <span>Password</span>
                <div class="border rounded validate-input" data-validate="Password is required">
                    <input id="password" type="password" {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    <span class="focus-input100"></span>
                    
                </div>

                <span>Confirm Password</span>
                <div class="border rounded validate-input" data-validate="Password is required">
                    <input id="password-confirm" type="password"name="password_confirmation" required>

                    <span class="focus-input100"></span>
                    
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">

                    
                </div>
        

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Create account
                    </button>
                </div>
                <hr>
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}">
                                {{ __('I have an Account') }}
                            </a>
                        @endif

            </form>

            <div class="login100-more" style="background-image: url('https://www.247commerce.co.uk/wp-content/uploads/2018/07/enterprise-ecommerce-platform-2.jpg');">
            </div>
        </div>
    </div>
</div>
@endsection
<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->
