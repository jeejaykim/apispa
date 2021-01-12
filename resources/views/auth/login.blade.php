<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('images/logo.ico')}}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Auth/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Auth/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>
    
    
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                
                <span class="login100-form-title p-b-37">
                    Sign In
                </span>
                
                <div class="wrap-input100 validate-input m-b-20 form-group row" data-validate="Enter username">
                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                    
                    
                    <input id="username" type="username"
                    class="{{ $errors->has('username') ? ' is-invalid' : '' }} input100" name="username"
                    value="{{ old('username') }}" required autofocus>
                    
                    @if ($errors->has('username'))
                    <span class="invalid-feedback focus-input100" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                    @endif
                </div>
                
                
                <div class="wrap-input100 validate-input m-b-25 form-group row" data-validate="Enter password">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    
                    <input id="password" type="password"
                    class="{{ $errors->has('password') ? ' is-invalid' : '' }} input100" name="password" required>
                    
                    @if ($errors->has('password'))
                    <span class="invalid-feedback focus-input100" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                
                <div class="container-login100-form-btn form-group row mb-0">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Sign In') }}
                    </button>
                </div>
                
                
                
            </form>
            
            
        </div>
    </div>
    
    
    
    
    
</body>

</html>