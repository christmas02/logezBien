@extends('layouts/templatesbackend')

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
                     <a href="{{ route('appartement.create') }}" class="btn btn-primary mb-3">Ajouter un appartement</a>
                    <div class="row">
                      <div class="col-12">
                          <table class="table table-bordered table-hover table-sm center" id="example2">
                            <thead >
                                <tr class="bg-secondary">
                                    <th>N°</th>
                                    <th>Designation</th>
                                    <th>Réference</th>
                                    <th>Localisation</th>
                                    <th>Montant journalier de la réservation</th>
                                    <th>Proprietaire</th>
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
                                            <td>{{ $appartement->commune->libelle}}{{ $appartement->libelle }} </td>
                                            <td>{{ $appartement->montant_journalier }} FCFA</td>
                                            <td>{{ $appartement->user->name }} </td>
                                            
                                            <td>
                                            
                                                <a class="btn btn-primary btn-sm"  href="{{ route('appartement.show', $appartement->id) }}">
                                                    <i class="icon-edit"></i>
                                                </a>
                                               
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
        </div>
    </div>
    
             

        
@endsection