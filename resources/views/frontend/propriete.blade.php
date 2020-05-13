@extends('layouts/templatesfrontend')
@section('content')
<style>
    /*search box css start here*/
.search-sec{
    padding: 2rem;
}
.search-slt{
    display: block;
    width: 100%;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #55595c;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
.wrn-btn{
    width: 100%;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
@media (min-width: 992px){
    .search-sec{
        position: relative;
        top: -114px;
        background: rgba(26, 70, 104, 0.51);
    }
}

@media (max-width: 992px){
    .search-sec{
        background: #1A4668;
    }
}
</style>
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>NOS APPARTEMENTS MEUBLÉES PROCHE DE VOUS</h1>
        </div>
    </div>
</div>
<div class="featured-properties content-area">
    <div class="container">
        <!-- Main title -->
        <br><br><br>
          <div class="search-sec">
        <form action="{{ route('front.search') }}" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 p-0">
                            @csrf
                            <select class="form-control search-slt" name="commune_id">
                                <option>Localisation</option>
                                @foreach($communes as $commune)
                                    <option value="{{ $commune->id }}">{{ $commune->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                             <button type="submit" class="btn btn-danger wrn-btn">
                                <i class="fa fa-search"></i><strong>Rechercher</strong>
                             </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

        <!-- Slick slider area start -->
        <div class="slick-slider-area">
        <br><br><br>
            <div class="row">
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
             
              
            </div>

        </div>
    </div>
</div>
<!-- Featured Properties end -->
@endsection