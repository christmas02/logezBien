@extends('layouts/templatesfrontend')
@section('content')
<!-- Sub banner start -->
<div class="cover">
    <div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>4 ÉTAPES POUR RÉSERVER VOTRE LOGEMENT</h1>
            <p>Laissez vous guider dans votre recherche</p>
        </div>
    </div>
</div>
</div>
<!-- Sub Banner end -->
<!-- Properties details page start -->
<div class="properties-details-page content-area-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Heading properties 3 start -->
                <div class="heading-properties-3">
                    <h1></h1>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="properties-details-section">
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                        <!-- main slider carousel items -->
                        @if(!empty($images))
                        <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="{{ $imagefirst->id }}">
                                <img src="{{asset('images/'.$imagefirst->filename)}}" class="img-fluid" alt="slider-properties">
                            </div>
                          @foreach($images as $image)
                            <div class="item carousel-item" data-slide-number="{{ $image->id }}">
                                <img src="{{asset('images/'.$image->filename )}}" class="img-fluid" alt="slider-properties">
                            </div>
                          @endforeach
                          @else
                          Nous avons actuellement aucune image pour ce appartement sera disponible très bientôt
                         @endif
                        

                            <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                            <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                            <li class="list-inline-item active">
                                    <a id="carousel-selector-{{  $imagefirst->id }}" class="selected" data-slide-to="{{ $imagefirst->id }}" data-target="#propertiesDetailsSlider">
                                        <img src="{{asset('images/'.$image->filename )}}" class="img-fluid" alt="properties-small">
                                    </a>
                            </li>
                           @foreach($images as $image)
                            <li class="list-inline-item">
                                <a id="carousel-selector-{{  $image->id }}" class="selected" data-slide-to="{{ $image->id }}" data-target="#propertiesDetailsSlider">
                                    <img src="{{asset('images/'.$image->filename)}}" class="img-fluid" alt="properties-small">
                                </a>
                            </li>
                            @endforeach
                        
                        </ul>
                    </div>

                    <!-- Tabbing box start -->
                    <div class="tabbing tabbing-box mb-40">
                        <ul class="nav nav-tabs" id="carTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
                            </li>
 
                            <li class="nav-item">
                                <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5" aria-selected="true">Localisation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4" aria-selected="true">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="4-tab" data-toggle="tab" href="#3" role="tab" aria-controls="4" aria-selected="true">Visite 3D</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="carTabContent">
                            <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                                <div class="properties-description mb-50">
                                    <h3 class="heading-2">
                                        Description
                                    </h3>
                                   
                                    <?= $appartement->description; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab">
                                <div class="location mb-50">
                                    <div class="map">
                                        <h3 class="heading-2">Localisation de la propriété</h3>
                                        <div id="map" class="contact-map">
                                        <?= $appartement->commune->libelle; ?>
                                        <?= $appartement->libelle; ?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="4" role="tabpanel" aria-labelledby="4-tab">
                                <div class="inside-properties mb-50">
                                    <h3 class="heading-2">
                                        Vidéo de propriété
                                    </h3>
                                    <!--<iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>-->
                                    <iframe src="https://www.youtube.com/embed/{{ $appartement->linkvideo }}" allowfullscreen=""  autoplay="true"></iframe>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="3" role="tabpanel" aria-labelledby="4-tab">
                                <div class="inside-properties mb-50">
                                    <h3 class="heading-2">
                                        Vidéo de propriété
                                    </h3>
                                    <!--<iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>-->
                                    <iframe src="https://www.youtube.com/embed/{{ $appartement->video3d }}" allowfullscreen="" autoplay="true"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                
                    <div class="contact-2 financing-calculator widget">
                    <h3 class="heading-2">{{ $appartement->designation }} dans la zone de {{ $appartement->commune->libelle }}</h3>
                    <!-- Comments start -->
                    <ul class="comments">
                        <li>
                            <div class="comment">
                                <div class="comment-author">
                                    <a href="#">
                                        <img src="{{asset('images/'.$imagefirst->filename )}}" class="img-fluid" alt="properties-small">
                                    </a>
                                </div>
                                <div class="comment-content">
                                    <div class="comment-meta">
                                        <h3>{{ $appartement->ref }}</h3>
                                        <p>lLorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
                                    </div>
                                </div><br>
                            </div>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="sidebar-right">
                    <div class="contact-2 financing-calculator widget">
                    <h3 class="heading-2">Montant de la locatiom Journaliere</h3>
                    <h3 class="heading-2">{{ number_format($appartement->montant_journalier)}} FCFA/ Jour</h3>
                    
                    <!-- Comments start -->
                    <ul class="comments">
                    <h5 class="sidebar-title">Disponibilité </h5>
                    <h3 class="heading-2">
                    @if($appartement->etat == 'disable')
                      <div class="btn btn-danger btn-lg btn-block">appartement Occupé</div> 
                    @else
                      <div class="btn btn-primary btn-lg btn-block">appartement disponible</div> 
                    @endif
                     </h3>
                        <li>
                            <div class="comment">
                                <h3 class="heading-2">Montant de la locatiom mensuelle</h3>
                                <h3 class="heading-4">{{ number_format($appartement->montant_journalier * 30) }}  fr</h3>
                            </div>
                        </li>
                    </ul>
                        <h5 class="sidebar-title">Reservation</h5>
                        <div class="s-border"></div>
                         <a href="https://www.facebook.com/sharer/sharer.php?u={http://localhost:8000/properties_details/{{$appartement->id}}}"><span class="fa fa-facebook"></span></a> 
                        <!--<form action="" method="" enctype="">-->
                        <a href="https://twitter.com/intent/tweet/?url={http://localhost:8000/properties_details/{{$appartement->id}}}&text={text}&via={via}"><span class="fa fa-twitter"></span></a> 
                            <div class="form-group mb-0">
                            <br>
                            @if($appartement->etat == 'disable')
                                <a class="btn button-theme btn-md btn-block" href=""> appartement indisponible </a> 
                            @else
                            @if(auth()->check())
                               <a class="btn button-theme btn-md btn-block" href="{{ route('front.reservation', $appartement->id) }}"> Reservez </a> 
                              @else
                               <a class="btn button-theme btn-md btn-block" href="{{ route('front.login', $appartement->id) }}">Reservez</a> 
                            @endif
                            @endif
                              
                            </div>
                       

                        
                        <!--</form>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Properties details page end -->
@endsection