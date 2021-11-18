
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="/img/img-01.png" alt="IMG">
            </div>

            <form method="POST" action="{{ route('register') }} class="login100-form validate-form">
					<span class="login100-form-title">
						Member Registration
					</span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="name" id="name" placeholder="Name" :value="old('email')" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" name="email" id="email" placeholder="Email" :value="old('email')" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>
                <div class="wrap-input100 validate-input">
                    <p class="text-center">Did you wont to be an author?</p>
                    <select class="input100"  name="author">
                        <option selected> yes</option>
                        <option> no</option>
                    </select>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Register
                    </button>
                </div>


                <div class="text-center p-t-136">
                    <a class="txt2" href="{{route('auth')}}">
                        {{ __('Already registered?') }}
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>





