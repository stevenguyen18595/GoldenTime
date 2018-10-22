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
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
        <link href="{{asset('css/myhelper.css')}}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Shadows Into Light', cursive;
                font-weight: bold;
                height: 100vh;
                margin: 0;
            }
            body{
              background-image: url("images/background-1.jpg");
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

            .title{
              font-family: 'Shadows Into Light', cursive;
            }
            .button-style{
              font-family: 'Shadows Into Light', cursive;
              font-weight: bold;
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
        <style media="screen">
          .logo{
            height:63.8px;
            width: 240px;
          }
          .p-border{
            position: relative;
            border-bottom: 1px solid white;
            width: 102.5%;
          }
          .landing-page-area{
            font-family: 'Charmonman', cursive;
            color: white;
            font-size: 45px;
            margin-top: 5%;
            margin-left:11%;
            -webkit-filter: 100%; /* Safari 6.0 - 9.0 */
            filter: 100%;
          }
          .landing-page-area2{
            font-family: 'Charmonman', cursive;
            font-size: 28px;
            margin-left:11%;
            margin-top: 12px;
            color: white;
            font-weight: 680;
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
          <!-- here is the landing page section for marketing -->
          <div class="columns">
            <div class="column is-2 ">
            </div>
            <div class="column is-6">
              <div class="p-border">
                <p class="landing-page-area">Welcome to Goldentime</p>
                <p class="landing-page-area2">* This is a web-platform that is developed by team L which allow </br>
                  people to learn History of Queensland through timeline .</br>
                  * You will be able to see what happened in the past through photos that were taken by local photographers at those times .</br>
                  * After finishing a learining tour, a pictionary game will be given to you to test what you have learned so far.</br>
                  * There are some traditional songs that will be played along with your study.</br>
                  * Finally, this is built mainly for high school students.
                </p>

              </div>
            </div>
            <div class="column  is-2 ">
              <div class="card">
                <div class="card-content">

                  <h1 class="title"> Log In </h1>
                  <hr>
                  <form class="" action="{{ route('login') }}" method="post" role="form">
                    {{ csrf_field() }}
                    <div class="field">
                      <label for="username" class="label"> Username </label>
                      <p class="control has-icons-left">
                        <input class="input {{ $errors->has('username')? 'is-danger' : '' }}" type="username" name='username' id='username' placeholder="username" value="{{ old('username') }}">
                        <span class="icon is-small is-left">
                          <i class="fas fa-envelope"></i>
                        </span>
                      </p>
                      @if ($errors->has('username'))
                        <p class="help is-danger"> {{ $errors->first('username') }}</p>
                      @endif
                    </div>

                    <div class="field">
                      <label for="password" class="label"> Password </label>
                      <p class="control has-icons-left">
                        <input class="input {{ $errors->has('password')? 'is-danger' : '' }}" type="password" name="password" id='password' placeholder="Password">
                        <span class="icon is-small is-left">
                          <i class="fas fa-lock"></i>
                        </span>
                      </p>
                      @if ($errors->has('password'))
                        <p class="help is-danger"> {{ $errors->first('password') }}</p>
                      @endif
                    </div>

                    <b-checkbox name="remember" class="m-t-20"> Remember me </b-checkbox>
                    <button class="button is-dark is-outlined is-fullwidth m-t-30 button-style"> Login </button>
                    <a class="button is-danger is-small is-outlined m-t-10 " href="{{ route('password.request') }}"> Forgot Your Password? </a>
                    <a class="button is-dark is-small is-outlined m-t-10 " href="{{ route('register') }}"> Don't have an account </a>
                  </form>
                  <img src="{{asset('images/background.jpg')}}" alt="">
                </div>
              </div>
            </div>
            <div class="column is-2">

            </div>
          </div>
      </div>
    </body>
</html>
