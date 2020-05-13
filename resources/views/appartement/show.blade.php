@extends('layouts/templatescarousel')
@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card">
                  <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <!--<button type="button" class="close" aria-label="Close" @click="close">
                                <span aria-hidden="true">&times;</span>
                            </button>-->
                          {{ session('message') }}
                        </div>
                    @endif
                    <h3 class="card-title text-center mb-5">Appartements</h3>
                    <a href="{{ route('appartement.create') }}" class="btn btn-primary mb-3">Ajouter un appartement </a>
                    <div class="row">
                      <div class="col-12 table-responsive">
                          <table class="table table-bordered table-hover table-sm center" id="example2">
                            <thead >
                                <tr class="bg-secondary">
                                    <th>Nom Proprietaire</th>
                                    <th>Localisation</th>
                                    <th>Etat</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr>
                                            <td>{{ $appartement->user->name }}</td>
                                            <td>{{ $appartement->commune->libelle }} </td>
                                            <td>
                                            @if($appartement->statut=="unverified" and $appartement->etat=="inactive" )
                                                <b class="btn btn-warning btn-sm">En attente de validation</b>
                                                @elseif($appartement->statut=="verified" and $appartement->etat=="active")
                                                <b class="btn btn-success btn-sm">En ligne</b>
                                                @elseif($appartement->statut=="verified" and $appartement->etat=="disable")
                                                <b class="btn btn-dark btn-sm">En occupation</b>
                                            @endif
                                          </td>
                                            
                                            <td>
                                              <a href="{{ route('image.create', $appartement->id) }}" class="btn btn-primary mb-3">ajouter images</a>
                                            <a class="btn btn-primary btn-sm" href="{{route('appartement.edit', $appartement->id) }}" >
                                              ajouter lien de visite
                                                </a>
                                                @if($appartement->statut=="verified" and $appartement->etat=="active")
                                                <a href="#desactiveappart" data-toggle="modal" class="btn btn-warning btn-sm">Mettre en hors ligne</a>

                                                @else
                                                <a href="#activeappart" data-toggle="modal" class="btn btn-success btn-sm">Mettre en  ligne</a>

                                                @endif

                                                <a class="btn btn-danger btn-sm" data-toggle="modal" href="#mb-delete{{ $appartement->id }}"><i class=" icon-trash"></i></a>
                                                
                                              </td>
                                        </tr>
                            </tbody>
                          </table>
                    <h4 class="mt-4"> Images de l'appartement</h4>
                    <div class="row portfolio-grid my-5">
                      @foreach ($images as $image)
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                        <figure class="effect-text-in">
                          <?php $photo = empty($image->filename) ? 'default.png' : $image->filename;?>
                        <img src="/images/{{ $image->filename }}" alt="{{ $image->name }}" width="300"/> 
                          <figcaption>
                            <h4>{{ $image->name }}</h4>
                            <p>
                                {{ $image->description }}
                                <a  href="{{ route('image.edit', ['image'=>$image->id, 'appartement_id'=>$appartement->id]) }}"  class=" btn-sm btn btn-primary">Edit</a>
                                <button type="submit" class="btn-sm btn btn-danger"  data-toggle="modal" data-target="#mb-delete_{{ $image->id }}">Delete</button>
                            </p>
                          </figcaption>
                        </figure>
                      </div>
                      @endforeach
                    </div>

            
                
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
               @foreach ($images as $image)
          <div class="modal fade" id="mb-delete_{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title login-title" id="myModalLabel">Supprimer {{ $image->name }}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              
                          </div>
                          <div class="modal-body">
                              <p>La suppression est irréverssible!!!.
                                  Voulez-vous vraiment Supprimer cetle ligne ?</p>
                          </div>
                          <div class="modal-footer">
                              <button class="btn btn-default" data-dismiss="modal" type="button">
                                  <i class="fa fa-reply"></i> Annuler
                              </button>
    

                               <form action="{{ route('image.destroy', ['image'=>$image->id, 'appartement_id'=>$appartement->id]) }}" method="POST">
                                     @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-success">Valider</button>
                                </form>

                          </div>
                      </div>
                  </div>
              </div>
          @endforeach



            <div class="modal fade" id="mb-delete{{$appartement->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title login-title" id="myModalLabel">Supprimer </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                
                            </div>
                            <div class="modal-body">
                                <p>La suppression est irréverssible!!!.
                                    Voulez-vous vraiment Supprimer cetle ligne?</p>
                                    <a href ="{{route('appartement.delete', $appartement->id)}}"  class="btn btn-success">
                                  valider
                                </a>
                                <button class="btn btn-default" data-dismiss="modal" type="button">
                                    <i class="fa fa-reply"></i> Annuler
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- popup pour activer la publication  -->

<div class="modal fade" id="activeappart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activer la publication de cette propriété </h5>
        <br>
        <p class="text-primary">L'activation de cette propriété presume que vous avez visiter la propriété et
          mise à jour les informations
        </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('appartement.saved', $appartement->id)}}" id="terms" method="POST">
                    {{csrf_field()}}
					<div class="radio">
            <input id="radio-1" name="statut" value="verified" type="radio" required>
            <input type="hidden" name="etat" value="active">
						<label for="radio-1"><span class="radio-label"></span>Je marque cette propriété comme verifiée</label>
					</div>
            <button id="noteprestataire" class="btn btn-primary" type="submit" form="terms">Activer</button>
				</form>      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<!-- popup pour desactiver la publication  -->
<div class="modal fade" id="desactiveappart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Desactiver la publication de cette propriété  <br>
        <span class="text-danger">cette action annulera la publication de cette propriété
        </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('appartement.desactived', $appartement->id)}}"  method="POST">
                    {{csrf_field()}}
					<div class="radio">
            <input id="radio-1" name="statut" value="unverified" type="radio" required>
            <input type="hidden" name="etat" value="inactive">
						<label for="radio-1"><span class="radio-label"></span>Je désactive cette propriété</label>
					</div>
            <input type="submit" id="noteprestataire" class="btn btn-success" type="submit" value="Desactiver">
            <button class="btn btn-primary" data-dismiss="modal">Annuler</button>

        </form>   
         </div>
    </div>
  </div>
</div>

@endsection