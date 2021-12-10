@extends('user.index')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="">
                <div class="">
                    <div class="text-center">{{ __('Reset Password') }}</div>

                    <div class="">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf


                                <label for="email" class="login100-form-title">{{ __('E-Mail Address') }}</label>

                                <div class="wrap-input100 validate-input">
                                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="container-login100-form-btn">
                                    <button type="submit" class="login100-form-btn">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
