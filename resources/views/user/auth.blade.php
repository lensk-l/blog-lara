@extends('user.index')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="/img/img-01.png" alt="IMG">
            </div>

            <form method="POST" action="{{ route('login') }}"  class="login100-form validate-form">
                @csrf
					<span class="login100-form-title">
						Member Login
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100 @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Email">
                    @error('email')
                    <span class="txt1" role="alert">
                                        <p  class="txt1">{{ $message }}</p>
                                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                    @error('password')
                    <span class="txt1" role="alert">
                                        <p  class="txt1">{{ $message }}</p>
                                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="text-center">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="txt1">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="container-login100-form-btn">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <x-button class="login100-form-btn">
                        {{ __('Log in') }}
                    </x-button>
                </div>

                <div class="text-center">
                    <a class="txt2" href="{{route('register')}}">
                        {{ __('Register') }}
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

