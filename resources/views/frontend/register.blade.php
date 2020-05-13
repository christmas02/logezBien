@extends('layouts/templatesauth')

@section('content')


    <!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                
                    <!-- details -->
                    <div class="details">
                   
                        <!-- Logo-->
                        <a href="/">
                            <img src="{{asset('images/logo/black-logo.png')}}" class="cm-logo" alt="black-logo">
                        </a>
                        {{ $errors }}
                        <!-- Name -->
                        <h3>Créer votre compte</h3>
                        <!-- Form start-->
                        <form action="{{ route('register') }}" method="POST">
                         @csrf
                         <div class="account-type">
													<div>
														<input type="radio" name="role" value="client" id="freelancer-radio" class="account-type-radio" checked/>
														<label for="freelancer-radio" ><i class="icon-material-outline-account-circle"></i> Client</label>
													</div>

													<div >
														<input type="radio" name="role" value="proprietaire"  id="employer-radio" class="account-type-radio"/>
														<label for="employer-radio"><i class="icon-material-outline-business-center"></i> proprietaire</label>
													</div>
													
						</div>
                            <div class="form-group">
                                <input type="text" name="name" class="input-text {{ $errors->has('name') ? ' is-invalid' : '' }}"   value="{{ old('name') }}" placeholder="Votre nom et prenom">
                            </div>
                             @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                             @endif
                            <div class="form-group">
                                <input type="email" name="email" class="input-text {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Votre adrese e-mail">
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <div class="form-group">
                                <input type="password" name="password" class="input-text" placeholder="mot de passe">
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="input-text" placeholder="confirmation du mot de passe">
                            </div>
                            <input type="hidden" name="inscription" value="page_acceuil">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">Inscription</button>
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
                        <span>Vous etre déja membre ? <a href="{{ route('front.login') }}">Connecter vous </a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->


@endsection()