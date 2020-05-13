@extends('layouts/auth')

@section('content')
<div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper auth p-0 theme-two">
            <div class="row d-flex align-items-stretch">
              <div class="col-md-4 banner-section d-none d-md-flex align-items-stretch justify-content-center">
                <div class="slide-content bg-1">
                </div>
              </div>
              <div class="col-12 col-md-8 h-100 bg-white">
                <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
                  <div class="nav-get-started">
                    <!--<p>Don't have an account?</p>-->
                    <a class="btn get-started-btn" href="">PAGE D'ACCEUIL</a>
                  </div>
                  <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                     @csrf
                    <h3 class="mr-auto">Formulaire de Connexion</h3>
                    <p class="mb-5 mr-auto">Saisissez vos paramètres de connexion</p>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="icon-user"></i></span>
                        </div>
                        <!-- <input type="text" class="form-control" placeholder="Username"> -->
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Login" required autofocus>
                      </div>
                       @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                       @endif
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="icon-lock"></i></span>
                        </div>
                        <!-- <input type="password" class="form-control" placeholder="Password"> -->
                         <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Mot de Passe" required>
                      </div>
                      @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                      @endif
                    </div>
                   
                    <!--<div class="form-group row">
                        
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                    
                    </div> -->
                    <!-- <div class="form-group">
                      <button class="btn btn-primary submit-btn">SIGN IN</button>
                    </div> -->
                     <div class="form-group form-check row ml-4">
                         <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                         <label class="form-check-label" for="remember">
                               Se souvenir de moi
                         </label>

                    </div>
                    <div class="form-group row ml-1">
                                      @if (Request::has('previous'))
                        <input type="hidden" name="previous" value="{{ Request::get('previous') }}">
                      @else
                          <input type="hidden" name="previous" value="{{ URL::previous() }}">
                      @endif
                        <button type="submit" class="btn btn-primary submit-btn">
                           Connexion
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Avez vous oubliez votre mot de passe ?
                        </a>
                    </div>
                   
                    <div class="wrapper mt-5 text-gray">
                      <p class="footer-text">Copyright © 2019 Impact Afrique. tous droits réservés.</p>
                      <ul class="auth-footer text-gray">
                        {{-- <li><a href="#">Terms & Conditions</a></li> --}}
                        <li><a href="#">Impact Afrique</a></li>
                      </ul>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
@endsection
  