@extends('layouts/templatesfrontend')
@section('content');
<!-- Main header start -->
<!--<header class="main-header header-transparent sticky-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="/">
                <img src="/assets/img/logos/logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav ml-auto">
                    <li class="nav-item" style="padding-top: 20px;">
                        <a class="btn btn-danger" href="{{ route('front.proprietaire') }}">Je suis propriétaire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="{{ route('front.comment_marche') }}" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" style="color: #000;" aria-expanded="false">Comment ça mache</a>
                    </li>
                    <li class="nav-item dropdown active ">
                        <a class="nav-link dropdown-toggle" href="{{ route('front.register') }}" style="color: #000;" aria-haspopup="true" aria-expanded="false">S'inscrire</a>
                    </li>
                    <li class="nav-item dropdown active ">
                        <a class="nav-link dropdown-toggle" href="{{ route('front.login') }}" id="dropdown01" style="color: #000;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Se connecter</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </div>
</header>-->
<!-- Main header end -->
<div class="properties-details-page content-area-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br><br><br>
                <!-- Heading properties 3 start -->
                <div class="heading-properties-3">
                    <h1>Félicitations</h1>
                    <div class="mb-30"><span class="rent">Reservation terminer</span> </div>
                </div>
            </div>
    <a href="{{route('user.dashboard')}}" ><h5>Retour au dashboard</h5></a>
  </div>
    </div>
</div>
<!-- Properties details page end -->
@endsection
