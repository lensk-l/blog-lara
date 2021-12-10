@extends('user.index')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="/img/img-01.png" alt="IMG">
            </div>

            <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                @csrf
					<span class="login100-form-title">
						Member Registration
					</span>

                <div class="wrap-input100 validate-input">
                    <input class="input100 @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="txt1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="{{ __('E-Mail Address') }}" :value="old('email')" required>
                    @error('email')
                    <span class="txt1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                </div>

                <div class="wrap-input100 validate-input" >
                    <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                    @error('password')
                    <span class="txt1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fa fa-lock" aria-hidden="true"></i></span>
                </div>


                <div class="wrap-input100 validate-input">
                        <input placeholder="{{ __('Confirm Password') }}" id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"><i class="fa fa-lock" aria-hidden="true"></i></span>
                </div>

                <div class="wrap-input100 validate-input row justify-content-around" >
                   <p class="txt2">Did you want to be an author</p>
                       <input class=" " type="checkbox" name="is_author" value="1">
                </div>


                 <div class="container-login100-form-btn">
                     <button type="submit" class="login100-form-btn">
                        {{ __('Register') }}
                    </button>
                 </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="#">
                        {{ __('Already registered?') }}
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection




