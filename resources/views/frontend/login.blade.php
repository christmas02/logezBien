@extends('layouts/templatesauth')

@section('content')

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTNPV7L"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo -->
                        <a href="/">
                            <img src="{{asset('images/logo/black-logo.png')}}" class="cm-logo" alt="black-logo">
                        </a>
                        <!-- Name -->
                        <h3>Connectez-vous pour accéder à votre compte</h3>
                       
                        <!-- Form start -->
                        <form action="{{ route('login') }}" method="POST">
                           @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="input-text {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Adresse email"  value="{{ old('email') }}"  required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <div class="form-group">
                                <input type="password" name="password" class="input-text {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe">
                            </div>
                             @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                             @endif
                            <div class="checkbox">
                                <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Se souvenir de moi
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}l" class="link-not-important pull-right">Mot de passe oublié</a>
                                <div class="clearfix"></div>
                            </div>
                                            
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">Connexion</button>
                            </div>
                        </form>
                        <!-- Social List -->
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Vous ne poccédez pas de compte? <a href="{{ route('front.register') }}">Inscriprion</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

<!-- Full Page Search -->

@endsection