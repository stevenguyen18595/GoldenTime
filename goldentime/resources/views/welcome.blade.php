<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-ui.js') }}" defer></script>
        <script src="{{ asset('js/jquery.js') }}" ></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
        <link href="{{asset('css/myhelper.css')}}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            body{
              background-image: url("images/background.jpg");
              background-repeat: no-repeat;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .img-h-w{
              padding: 0px;
              margin:0px;
              height:150px;
              width:450px;;
            }
        </style>

    </head>
    <body>
        <div>
          <nav class="navbar is-transparent is-light">
            <div class="container">
              <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/home') }}">
                  <img src="{{ asset('images/logo.png') }}" alt="Bulma: a modern CSS framework based on Flexbox" class="logo">
                </a>
              </div>
            @if (Route::has('login'))
              @auth
                <div class="navbar-item navbar-end">
                  <div class="field is-grouped">
                    <p class="control">
                      <a href="#" class="button is-outlined" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->first_name }} {{Auth::user()->last_name}} <span class="caret"></span>
                      </a>
                    </p>
                    <p class="control">
                      <a class="button is-outlined" href="{{ url('/logout') }}">
                        <span>
                          <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span>
                          Logout
                        </span>
                      </a>
                    </p>
                  </div>
                </div>

              @else

                  <div class="navbar-item navbar-end">
                    <div class="field is-grouped">
                      <p class="control">
                        <a class="button is-outlined" href="{{route('login')}}"> <!--this is login button -->
                          <span class="icon">
                            <i class="fas fa-sign-in-alt"></i>
                          </span>
                          <span>
                            Login
                          </span>
                        </a>
                      </p>
                      <p class="control">
                        <a class="button is-outlined" href="{{route('register')}}">
                          <span class="icon">
                            <i class="fas fa-user-plus"></i>
                          </span>
                          <span>Sign up</span>
                        </a>
                      </p>
                    </div>
                  </div>

              @endauth

            @endif
            </div>
          </nav>


            <div class="content">
                <img src="{{ asset('images/logo.png') }}" alt="Bulma: a modern CSS framework based on Flexbox" class="img-h-w">
                <div class="links">
                  <!--we put the game here -->
                </div>
            </div>

      </div>
    </body>
</html>
