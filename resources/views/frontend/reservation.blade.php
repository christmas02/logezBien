@extends('layouts/templatesfrontend')

@section('content')

    <!-- Properties details page start -->
<div class="properties-details-page content-area-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Heading properties 3 start -->
                <div class="heading-properties-3">
                    <h1></h1>
                    <div class="mb-30"><span class=""></span> <span class="rent"></span> <span class=""><i class=""></i></span></div>
                </div>
            </div>

            
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="properties-details-section">
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                    <div class="submit-address dashboard-list">
                        <form method="POST" action="{{route('reservation')}}">
                        @csrf
                        <input type="hidden" value="{{ $appartement->id }}" name="appartement_id">
                            <h4 class="bg-grea-3">Vos informations personnelles <br><small>Commençons par vous présenter au propriétaire</small></h4>

                            <div class="search-contents-sidebar">
                                <div class="row pad-20">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Téléphone</label>
                                            <input type="text" class="input-text" name="phone" placeholder="Téléphone" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Date de naissance</label>
                                            <div class="input-group input-daterange">
                                                <input id="startDate" name="date_naissance" type="text" class="form-control"readonly="readonly" placeholder="00-00-0000" required> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Sexe</label>
                                            <select class="selectpicker search-fields" name="genre" required>
                                                <option value="F">Femme</option>
                                                <option value="H">Homme</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Nombre de personnes</label>
                                            <input class="input-text"  name="nbre_personnes" type="text" class="form-control" placeholder="Entrez le nombres de personnes" required> 
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <h4 class="bg-grea-3">Vos coordonnées<br><small>De cette façon, votre propriétaire ou Spotahome peut vous contacter</small> .</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="text" class="input-text" name="email" value="{{ Auth::user()->email }}"  placeholder="exempl@exemple.com">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    <div class="form-group">
                                        <label>Nom et prénom</label>
                                        <input type="text" class="input-text" name="nom_prenoms" value="{{ Auth::user()->name }}"  placeholder="Konaon toto">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6  col-sm-6">
                                <div class="form-group">
                                            <label>Date de debut</label>
                                        <div class="input-group input-daterange">
                                                <input id="startDate2" name="pdate_debut" type="text" class="form-control"readonly="readonly" placeholder="00-00-0000" required> 
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-6 col-md-6  col-sm-6">
                                <div class="form-group">
                                            <label>Date de fin</label>
                                        <div class="input-group input-daterange">
                                                <input id="endDate" name="pdate_fin" type="text" class="form-control"readonly="readonly" placeholder="00-00-0000" required> 
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="row pad-20">
                           
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                   <input  type="submit" class="btn btn-md button-theme" value="Enregistré">    
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                
                    <div class="contact-2 financing-calculator widget">
                    <h3 class="heading-2"></h3>
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
                                        <h3>{{ $appartement->designation }}</h3>
                                    </div>
                                    <p></p>
                                </div>
                            </div>
                        </li>
                        <p>Libellé</p>
                        <strong>{{ $appartement->ref}}</strong>
                    </ul>
                    </div>
                </div>

                <div class="sidebar-right">
                
                    <div class="contact-2 financing-calculator widget">
                    <?php 
                        $dure_jour = (strtotime($appartement->pdate_fin) - strtotime($appartement->pdate_debut));
                        $duree_jour = $dure_jour / 86400;
                    ?>
                    <h3 class="heading-2"></h3>
                    <!-- Comments start -->
                    <ul class="comments">
                        <li>
                            <div class="comment">
                                <p><strong>Total à payer pour réserver&nbsp;&nbsp;&nbsp;{{ $appartement->montant_journalier }} fcfa</strong></p>
                            </div>
                        </li>
                    </ul>   
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Properties details page end -->
@endsection