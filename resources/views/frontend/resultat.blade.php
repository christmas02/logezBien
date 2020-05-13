@extends('layouts/templatesfrontend')
@section('content')
<div class="banner-slider-inner">
    <div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>NOS APPARTEMENTS MEUBLÉES PROCHE DE VOUS</h1>
        </div>
    </div>
</div>
</div>


<div class="featured-properties content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-left">
            <h1>Résultat de la recherche </h1>
            <p></p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row">
              @if(!empty($appartements))
                @foreach($appartements as $appartement)
                    <div class="col-md-4 slick-slide-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="{{ route('front.properties_details', $appartement->id) }}" class="property-img">
                                     <?php  $img= App\Image::where('appartement_id','=',$appartement->id)->first(); ?>
                                     <img class="d-block w-100" src="{{asset('images/'.$img->filename)}}" alt="properties">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="{{ route('front.properties_details', $appartement->id) }}">Appartement de {{ $appartement->superficie }} m<sup>2</sup></a>
                                </h1>

                                <div class="location">
                                    <a href="{{ route('front.properties_details', $appartement->id) }}">
                                        <i class="flaticon-pin"></i>{{ $appartement->commune->libelle }}
                                    </a>
                                </div>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <span>Salon</span> {{ $appartement->salon }}
                                </li>
                                <li>
                                    <span>Chambre</span> {{ $appartement->chambre }}
                                </li>
                                <li>
                                    <span>Salle d'eau</span> {{ $appartement->salle_eau }}
                                </li>
                                <!--<li>
                                    <span>Garage</span> 1
                                </li>-->
                            </ul>
                        </div>
                    </div>
                @endforeach
              @else
                <p class="text-center"> Aucun Résultats Disponible </p>
              @endif
              
            </div>

        </div>
    </div>
</div>
<!-- Featured Properties end -->
@endsection