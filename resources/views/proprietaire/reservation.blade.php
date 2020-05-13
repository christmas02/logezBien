@extends('layouts/hearder')
@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main">
            <div class="content-wrapper">
                <div class="card">
                  <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" aria-label="Close" @click="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          {{ session('message') }}
                        </div>
                    @endif
                    <h3 class="card-title text-center mb-5">Liste des Réservations</h3>
                     <!--<a href="{{ route('reservationbackend.create') }}" class="btn btn-primary mb-3">Ajouter une reservation</a>-->
                    <div class="row">
                      <div class="col-12 table-responsive">
                          <table class="table table-bordered table-hover table-sm center" id="example2">
                            <thead >
                                <tr class="bg-secondary">
                                    <th>N°</th>
                                    <th>appartement</th>
                                    <th>proprietaire de l'appartement</th>
                                    <th>Période de la réservation</th>
                                    <th>Nombre de jours de la réservation</th>
                                    <th>frais de la Réservation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $i=0; ?>
                                    @foreach ($reservations as $reservation)
                                    <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $reservation->appartement->designation }} </td>
                                            <td>{{ $reservation->appartement->user->name }} </td>
                                            <td>Réservé du {{ $reservation->pdate_debut }} jusqu'au {{ $reservation->pdate_fin }} </td>
                                            <td>
                                                 <?php 
                                                    $dure_jour = (strtotime($reservation->pdate_fin) - strtotime($reservation->pdate_debut));
                                                    $duree_jour = $dure_jour / 86400;
                                                ?>
                                                Disponible pendant {{ $duree_jour }} jours
                                            </td>
                                            <td></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm"  data-toggle="modal" href="#mb-detail-{{ $reservation->idReservation }}"  >
                                                    <i class="icon-note">detail</i>
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
    
             



            @foreach ($reservations as $reservation)
            <div class="modal fade container-lg" id="mb-detail-{{ $reservation->idReservation}}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title login-title" id="myModalLabel">détail de {{ $reservation->appartement->designation }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                
                            </div>
                            <div class="modal-body ">
                            <table class="table table-responsive table-info">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">reservateur</th>
      <th scope="col">phone</th>
      <th scope="col">email</th>
      <th scope="col">date_naissance</th>
      <th scope="col">Habitants</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td>{{$reservation->nom_prenoms}}</td>
      <td scope="col-3">{{$reservation->phone}}</td>
      <td>{{$reservation->email}}</td>

      <td>{{$reservation->date_naissance}}</td>
      <td>{{$reservation->nbre_personnes}}</td>

    </tr>
  </tbody>
</table>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal" type="button">
                                    OK
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach    
@endsection