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



                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i>
                                  </span>
                                </div>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>


                        </div>


                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fa fa-lock fa-fw" aria-hidden="true"></i>
                                  </span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="email" autofocus >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>


                        </div>

{{--                     <div class="form-group row">

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fa fa-lock fa-fw" aria-hidden="true"></i>
                                  </span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                             </div>




                    </div> --}}

                    <div class="wrap-input100"  style="padding-top: 1em;">


                        <div class="custom-control custom-checkbox mb-3" style="text-align: center;">
                            {{-- <input type="checkbox" class="custom-control-input" id="customCheck" name="example1"> --}}
                            <input class="custom-control-input input100" type="checkbox" name="remember" id="remember" checked={{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

{{--                         <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
 --}}
                        {{-- <input class="form-check-input" id="checkbox3" type="checkbox"> --}}

                        {{-- <label class="form-check-label" for="checkbox3"> --}}
                            {{-- {{ __('Remember Me') }} --}}
                        {{-- </label> --}}

                                {{-- <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}
{{--                     <div class="form-check abc-checkbox abc-checkbox-success">
                    </div>    
 --}}
                                {{-- <label class="form-check-label" for="remember" style="padding-top: 1em;"> --}}
                                    {{-- {{ __('Remember Me') }} --}}
                                {{-- </label> --}}

                        {{-- <input class="input100" type="password" name="pass" placeholder="Password"> --}}
                        {{-- <span class="focus-input100"></span> --}}
                        {{-- <span class="symbol-input100"> --}}
                            {{-- <i class="fa fa-lock" aria-hidden="true"></i> --}}
                        {{-- </span> --}}
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


