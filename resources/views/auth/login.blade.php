@extends('layouts.login1')

@section('content')

                <div class="login100-pic js-tilt" data-tilt>
                    <img src="/Login_v1/images/img-01.png" alt="IMG">
                </div>


                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
                        {{ __('Login') }}
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">

                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    

                        {{-- <input class="input100" type="text" name="email" placeholder="{{ __('E-Mail Address') }}"> --}}
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">

                                <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        {{-- <input class="input100" type="password" name="pass" placeholder="Password"> --}}
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">

                                {{-- <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}
    

                                <label class="input100" for="remember" style="padding-top: 1em;">
                                    {{ __('Remember Me') }}
                                </label>

                        {{-- <input class="input100" type="password" name="pass" placeholder="Password"> --}}
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            {{-- <i class="fa fa-lock" aria-hidden="true"></i> --}}
                        </span>
                    </div>


                    
                    <div class="container-login100-form-btn">
                        {{-- <button class="login100-form-btn">                            Login                        </button> --}}

                                <button type="submit" class="login100-form-btn">
                                    {{ __('Login') }}
                                </button>


                    </div>

                    @include('auth.links')

                </form>


@endsection


