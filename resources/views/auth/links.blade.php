                    <div class="text-center p-t-12">
                        {{-- <span class="txt1">                            Forgot                        </span> --}}
                        @if (Route::has('password.request'))
                            <a class="txt2" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="/register/">
                            {{ __('Register') }}
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                        /
                        <a class="txt2" href="/login/">
                            {{ __('Login') }}
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

