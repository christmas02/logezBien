@extends('layouts/templatesfrontend')

@section('content')
<!-- Banner start -->
<div class="banner" id="banner">
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block wh-100" src="/assets/Client/img/banner/banner-2.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner"></div>
            </div>
            <div class="carousel-item banner-max-height">
                <img class="d-block wh-100" src="/assets/Client/img/banner/banner-3.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner"></div>
            </div>
            <div class="carousel-item banner-max-height">
                <img class="d-block wh-100" src="/assets/Client/img/banner/banner-1.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner"></div>
            </div>
            <div class="carousel-caption d-flex h-100 banner-slider-inner-2">
                <div class="carousel-content container">
                    <div class="text-center my-5">
                        <h3 class="">Louez votre appartement en ligne</h3>
                        <form action="{{ route('front.search') }}" method="POST" >
                        @csrf
                        <div class="inline-search-area ml-auto mr-auto d-xl-block d-lg-block">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4">
                                    <select class="selectpicker search-fields" name="commune_id">
                                          <option>Localisation</option>
                                        @foreach($communes as $commune)
                                          <option value="{{ $commune->id }}">{{ $commune->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-4 col-lg-2 col-sm-2 col-md-2">
                                    <div class="input-group input-daterange">
                                    <input id="startDate" name="pdate_debut" type="text" class="form-control" readonly="readonly" placeholder="Arrivé" width="50%"> 
                                    <span class="input-group-addon">-></span> 
                                    <input id="endDate" name="pdate_fin" type="text" class="form-control" readonly="readonly" placeholder="Départ" width="50%">
                                    </div>
                                </div>
                                
                                <div class="col-xl-4 col-lg-2 col-sm-4">
                                    <button type="submit" class="btn button-theme btn-search btn-block">
                                        <i class="fa fa-search"></i><strong>Rechercher</strong>
                                    </button>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
    </div>
</div>
<!-- Banner end -->


<!-- section one start -->
<div class="featured-properties content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>COMMENT RÉSERVER VOTRE LOGEMENT?</h1>
            <p></p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row">
                <div class="col-md-12">
                    <img src="/assets/Client/img/brand/ppl.png" class="responsive">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 slick-slide-item">
                    <div class="">
                        <h4 class="text-center">Recherchez</h4>
                        <p>Recherchez votre logement idéal. Nos visites virtuelles, ainsi que nos descriptions de la propriété et du quartier, vous aideront dans votre prise de décision.</p>
                    </div>
                </div>
                <div class="col-md-3 slick-slide-item">
                    <div class="">
                        <h4 class="text-center">Réservez la propriété</h4>
                        <p>Lorsque vous faites une réservation, cette propriété est bloquée jusqu'à ce que le propriétaire réponde à votre demande (jusqu'à 24 heures).</p>
                    </div>
                </div>
                <div class="col-md-3 slick-slide-item">
                    <div class="">
                        <h4 class="text-center">Confirmation</h4>
                            <p>Dès que le propriétaire accepte la réservation, votre mode de paiement initialement sélectionné sera automatiquement débité. Vous serez dès à présent mis en contacte avec le propriétaire.</p>
                    </div>
                </div>
                <div class="col-md-3 slick-slide-item">
                    <div class="">
                        <h4>Date d'entrée</h4>
                        <p>Voilà, ce bien est le votre ! Tout ce qui vous reste à faire est de récupérer vos clefs et signer votre bail de location..</p>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12 text-center">
                  <a href="{{ route('front.comment_marche') }}"  class="btn btn-danger btn-md">Comment ça marche</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- section one end -->


<!-- section two start -->
<div id="two">
    <div class="section-overlay">
    <div class="section">
        <div class="container">
        <!-- Main title -->
        <div class="main-title text-center main">
            <h1>LES HOMECHECKERS VISITENT LES PROPRIÉTÉS... POUR QUE VOUS N'AYEZ PAS À LES VISITER.</h1>
            <p>Ce qui signifie que vous pouvez réserver votre nouvelle maison en ligne, en toute confiance. Cherchez le panneau "Checked by LogezBien" pour obtenir tout cela....</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row">
                <div class="col-md-4 slick-slide-item tems text-center">
                    <div class="">
                        <img src="/assets/Client/img/brand/house1.png" class="mb-10 img-responsive" width="100"> 
                        <h4 class="">Réalité</h4>
                        <p class="text-left">Nous vous montrons les taches de vin sur le tapis</p>
                    </div>
                </div>
                <div class="col-md-4 slick-slide-item tems text-center">
                    <div class="">
                        <img src="/assets/Client/img/brand/house2.png" class="img-center mb-10" width="100">
                        <h4 class="">Preuves à l'appui</h4>
                        <p class="text-left">Des photos HD, une visite vidéo et un plan au sol</p>
                    </div>
                </div>
                <div class="col-md-4 slick-slide-item tems text-center">
                    <div class="">
                        <img src="/assets/Client/img/brand/house3.png" class="mb-10" width="100"> 
                        <h4 class="">Confiance</h4>
                        <p class="text-left">Nous garantissons que le propriétaire et la propriété sont tous les deux réels.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    
    </div>
</div>
<!-- section two end -->

<!-- section three start -->
<div class="section">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>UNE ÉQUIPE DISPOSÉE À VOUS AIDER À TOUT MOMENT.</h1>
            <p>Nous nous engageons à vous offrir une recherche de logement plus agréable et sans stress. De la réservation à la confirmation finale, nous sommes là pour vous!</p><br><br>
            <button type="button" class="btn btn-danger btn-md">En savoir plus</button>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="text-center">
                       <img src="/assets/Client/img/service/team.png" class="responsive"> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section three end -->

<!-- section three start -->
<div class="section" id="four">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center main">
            <h1>NOUS NOUS SOUCIONS DE VOTRE PROPRIÉTÉ</h1>
            <p>Vous êtes propriétaire ? Publiez votre bien sans frais, et LogezBien se charge du reste.</p><br>
            <button type="button" class="btn btn-danger btn-md">Publiez votre propriété</button>
        </div>
    </div>
</div>
<!-- section three end -->


<!-- Categories strat -->
<div class="categories content-area-7">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Résidences Meublés de Haut Standing</h1>
            <p>Trouvez vos propriétés dans votre ville</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-pad">
                <a href="resultard.html" class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <img src="/assets/Client/img/properties/small-properties-1.jpg" style="width: 100%; height: 100%">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title text-center">
                                    <a href="#">JAQUE-VILLE</a>
                                </h3>
                                
                            </div>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </a>
                <div class="category-text">
                    <p>Où vivre à Madrid: Appartements à louer à Madrid Studios à louer à Madrid Chambres à louer à Madrid Résidences à louer à Madrid</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-pad">
                <a class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <img src="/assets/Client/img/properties/small-properties-1.jpg" style="width: 100%; height: 100%">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">YAMOUSSOKRO</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="category-text">
                    <p>Où vivre à Madrid: Appartements à louer à Madrid Studios à louer à Madrid Chambres à louer à Madrid Résidences à louer à Madrid</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-pad">
                <a class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <img src="/assets/Client/img/properties/small-properties-1.jpg" style="width: 100%; height: 100%">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">YAMOUSSOKRO</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="category-text">
                    <p>Où vivre à Madrid: Appartements à louer à Madrid Studios à louer à Madrid Chambres à louer à Madrid Résidences à louer à Madrid</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-pad">
                <a class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <img src="/assets/Client/img/properties/small-properties-1.jpg" style="width: 100%; height: 100%">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">YAMOUSSOKRO</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="category-text">
                    <p>Où vivre à Madrid: Appartements à louer à Madrid Studios à louer à Madrid Chambres à louer à Madrid Résidences à louer à Madrid</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-pad">
                <a class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <img src="/assets/Client/img/properties/small-properties-1.jpg" style="width: 100%; height: 100%">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">YAMOUSSOKRO</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="category-text">
                    <p>Où vivre à Madrid: Appartements à louer à Madrid Studios à louer à Madrid Chambres à louer à Madrid Résidences à louer à Madrid</p>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Categories end -->



<!-- Full Page Search -->

@endsection()