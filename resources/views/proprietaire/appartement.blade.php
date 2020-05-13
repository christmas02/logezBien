@extends('layouts/hearder')
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
                    <h3 class="card-title text-center mb-5">Liste des Appartements</h3>
                     <a href="{{ route('proprietaire.add') }}" class="btn btn-primary mb-3">Ajouter un appartement</a>
                    <div class="row">
                      <div class="col-12 table-responsive">
                          <table class="table table-bordered table-hover table-sm center" id="example2">
                            <thead >
                                <tr class="bg-secondary">
                                    <th>N°</th>
                                    <th>Designation</th>
                                    <th>Réference</th>
                                    <th>Localisation</th>
                                    <th>Montant journalier de la réservation</th>
                                    <th>Etat</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $j=0; $cpt=0;?>
                                    @foreach ($appartements as $appartement)
                                    <?php $j++; ?>
                                        <tr>
                                            <td>{{ $j }}</td>
                                            <td>{{ $appartement->designation }}</td>
                                            <td>{{ $appartement->ref }}</td>
                                            <td>{{ $appartement->commune->libelle}} {{ $appartement->libelle }} </td>
                                         
                                            <td>{{ $appartement->montant_journalier }} FCFA</td>
                                            <td>
                                                @if($appartement->statut=="unverified")
                                                <b class="btn btn-warning btn-sm">En attente de validation</b>
                                                @else
                                                <b class="btn btn-success btn-sm">En ligne</b>
                                                @endif
                                                    </td>  
                                          
                                            <td>
                                            @if($appartement->statut=='verified')

                                                <a class="btn btn-success btn-sm" href="{{ route('front.properties_details', $appartement->id)}}" target="_blank">
                                                    <i class="icon-eye"></i>
                                                </a>
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach
                            </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
             

            @foreach ($appartements as $appartement)
            <div class="modal fade" id="mb-delete_{{ $appartement->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title login-title" id="myModalLabel">Supprimer </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                
                            </div>
                            <div class="modal-body">
                                <p>La suppression est irréverssible!!!.
                                    Voulez-vous vraiment Supprimer cetle ligne?</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal" type="button">
                                    <i class="fa fa-reply"></i> Annuler
                                </button>
                               
                                <form action ="{{  route('appartement.destroy', $appartement->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-save"></i> Valider
                                    </button> 
                                    <input type="hidden" name="_method" value="DELETE">
                                 
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
@endsection