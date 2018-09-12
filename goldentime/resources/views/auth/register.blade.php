@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-50">
        <div class="card">
            <div class="card-content">

                <h1 class="title"> Register </h1>

                <form class="" action="{{ route('register') }}" method="post" role="form">

                    {{ csrf_field() }}

                    <div class="field">
                        <label for="username" class="label"> Username </label>
                        <p class="control has-icons-left">
                            <input class="input {{ $errors->has('username')? 'is-danger' : '' }}" type="username" name='username' placeholder="username">
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                        </p>
                        @if ($errors->has('username'))
                          <p class="help is-danger"> {{ $errors->first('username') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="email" class="label"> Email Address </label>
                        <p class="control has-icons-left">
                            <input class="input {{ $errors->has('email')? 'is-danger' : '' }}" type="email" name='email' placeholder="Email">
                            <span class="icon is-small is-left">
                              <i class="fas fa-envelope"></i>
                            </span>
                        </p>
                        @if ($errors->has('email'))
                          <p class="help is-danger"> {{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password" class="label"> Password </label>
                        <p class="control has-icons-left">
                            <input class="input {{ $errors->has('password')? 'is-danger' : '' }}" type="password" name="password" placeholder="Password">
                            <span class="icon is-small is-left">
                              <i class="fas fa-lock"></i>
                            </span>
                        </p>
                        @if ($errors->has('password'))
                          <p class="help is-danger"> {{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password_confirmation" class="label"> Password Confirmation </label>
                        <p class="control has-icons-left">
                            <input class="input {{ $errors->has('password_confirmation')? 'is-danger' : '' }}" type="password" name="password_confirmation" placeholder="Password Confirmation">
                            <span class="icon is-small is-left">
                              <i class="fas fa-lock"></i>
                            </span>
                        </p>
                        @if ($errors->has('password_confirmation'))
                          <p class="help is-danger"> {{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>
                    <div class="field">
                        <label for="first_name" class="label"> Firstname </label>
                        <p class="control has-icons-left">
                            <input class="input {{ $errors->has('first_name')? 'is-danger' : '' }}" type="first_name" name="first_name" placeholder="Firstname">
                            <span class="icon is-small is-left">
                              <i class="fas fa-signature"></i>
                            </span>
                        </p>
                        @if ($errors->has('first_name'))
                          <p class="help is-danger"> {{ $errors->first('first_name') }}</p>
                        @endif
                    </div>
                    <div class="field">
                        <label for="last_name" class="label"> Lastname </label>
                        <p class="control has-icons-left">
                            <input class="input {{ $errors->has('last_name')? 'is-danger' : '' }}" type="last_name" name="last_name" placeholder="lastname">
                            <span class="icon is-small is-left">
                              <i class="fas fa-signature"></i>
                            </span>
                        </p>
                        @if ($errors->has('last_name'))
                          <p class="help is-danger"> {{ $errors->first('last_name') }}</p>
                        @endif
                    </div>
                    <!-- age group -->
                    <div class="field">
                        <label for="age_group" class="label"> Age </label>
                        <p class="control has-icons-left">
                            <input class="input {{ $errors->has('age_group')? 'is-danger' : '' }}" type="age_group" name="age_group" placeholder="your age">
                            <span class="icon is-small is-left">
                              <i class="fas fa-signature"></i>
                            </span>
                        </p>
                        @if ($errors->has('age_group'))
                          <p class="help is-danger"> {{ $errors->first('age_group') }}</p>
                        @endif
                    </div>
                    <!--gender options -->
                    <!--checkbox-->
                    <div class="col-md-6">
                    <label for="age_group" class="label"> Gender </label>
                      <div><input id="female" type="radio"class="form-control" name="gender" value="Female" {{ (old('sex') == 'female') ? 'checked' : '' }} >Female</div>
                      <div><input id="male" type="radio"class="form-control" name="gender" value="Male" {{ (old('sex') == 'male') ? 'checked' : '' }} >Male</div>
                      <div><input id="other" type="radio"class="form-control" name="gender" value="Others" {{ (old('sex') == 'other') ? 'checked' : '' }} >Other</div>
                        @if ($errors->has('gender'))
                          <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                          </span>
                        @endif
                    </div>




                    <button class="button is-primary is-outlined is-fullwidth m-t-30"> Register </button>
                    <a class="button is-info is-small is-outlined m-t-10" href="{{ route('login') }}"> Already have an account? </a>
                </form>


            </div>
        </div>
    </div>
</div>

@endsection
