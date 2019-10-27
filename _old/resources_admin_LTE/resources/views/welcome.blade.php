<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <script src="/vendor/page-slider-js-master/slider.js"></script>
        <link rel="stylesheet" href="/vendor/page-slider-js-master/slider.css">

        <style>
          #norwegian {
            background: linear-gradient(225deg, #ffc27d, #ff8e93);
          }
          #french {
            background: linear-gradient(#f3defc, #63a3e6);
          }
          #spanish {
            background: linear-gradient(#d2fcad, #22eaeb);
          }
          #hindi{
            background: linear-gradient(#f0bed4, #a163f5);
          }
          #mandarin {
            background: linear-gradient(#65cce1, #6365ec);
          }
          #contact {
            background: linear-gradient(#65cce1, #6365ec);
          }

          section > span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 7vw;
            font-family: sans-serif;
            text-transform: uppercase;
            color: #fff;
          }
        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">

    <div class="slides">
      <section id="norwegian">
        <span>Главная</span>

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Домой</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif


      </section>
      <section id="french"><span>Bonjour</span></section>
      <section id="spanish"><span>Hola</span></section>
      <section id="hindi"><span>Namaste</span></section>
      <section id="mandarin"><span>你好</span></section>
      <section id="contact"><span>contact</span></section>
    </div>

    <script>
      var mySlider = slider('.slides');
    </script>

            {{-- <div class="content"> --}}

{{--                 <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> --}}
            {{-- </div> --}}
        </div>
    </body>
</html>
