@extends('layouts/templatesfrontend')

@section('content')


<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Bienvenue à la maison de la location sans stress</h1>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- About city estate start -->
<div class="about-real-estate  content-area-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="text-center">
                    <a href="{{ route('front.register') }}" class="btn btn-md button-theme">Inscrivez vous et reservez votre visite</a>
                </div>
            </div>
        </div><br><br><br>
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <img src="{{asset('images/properties/properties-list-3.jpg')}}" class="responsive">
            </div>
            <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div class="about-text">
                    <h3>Vous n'êtes qu'à une visite des réservations illimitées</h3>
                    <p>Faites la visite à notre Homechecker, et vous n'aurez plus besoin d'organiser des visites dans votre bien par la suite.</p>
                </div>
            </div>
        </div><br><br><br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="about-text text-center">
                    <h2>Retour maximum, coût minimum</h2>
                    <h4>Le mieux ? Vous ne payez pas pour la visite de notre Homechecker, nous nous en chargeons. Et voici ce que vous en tirerez.</h4>
                    <img src="{{asset('images/iphone-h.png')}}" class="responsive">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About city estate end -->



<!-- Counters strat -->
<div class="counters overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-sale"></i>
                    <h1 class="counter">0</h1>
                    <p>Nombre d'appartements</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-rent"></i>
                    <h1 class="counter">0</h1>
                    <p>Nos propriétaires</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-user"></i>
                    <h1 class="counter">0</h1>
                    <p>Agents</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-work"></i>
                    <h1 class="counter">0</h1>
                    <p>Nos clients satifaire</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters end -->

@endsection