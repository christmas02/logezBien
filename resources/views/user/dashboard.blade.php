@extends('layouts.user')
@include('layouts.usersidebar')
@section('content')
<style>
  table{
    border:1px;
    font-size: 16px;
    line-height: 22px;
  }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Mes reservations</h2>
        </div>
        <!-- Basic Card -->
    </div>
    <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Activité Recente</h2>
                        </div>
                        <div class="body">
                            <div class="table">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Etat</th>
                                            <th scope="col">date de debut</th>
                                            <th scope="col">date de fin</th>
                                            <th scope="col">duree periode</th>
                                            <th scope="col">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($reservations as $reservation)
                                          <tr>
                                             <th></th>
                                             <th scope="row">{{$reservation->designation}}</th>
                                             <td>
                                               <?php 
                                                $date_act = date('d/m/Y');
                                                $date_limit = date('d/m/Y', strtotime($reservation->pdate_debut));
                                               ?>
                                                @if($reservation->etat == 'active')
                                                  En attente
                                                @else
                                                    @if( $date_act > $date_limit )
                                                       Expirer
                                                    @else
                                                       En cour
                                                   @endif
                                                @endif
                                            </td>
                                            <td>{{ date('d/m/Y', strtotime($reservation->pdate_debut)) }}</td>
                                            <td>{{ date('d/m/Y', strtotime($reservation->pdate_fin)) }}</td>
                                            <td>
                                              <?php 
                                                    $dure_jour = (strtotime($reservation->pdate_fin) - strtotime($reservation->pdate_debut));
                                                    $duree_jour = $dure_jour / 86400;
                                              ?>
                                              {{ $duree_jour }} jours
                                            </td>
                                            <td>
                                              <a href="#{{$reservation->idReservation}}" class="btn btn-info" data-toggle="modal">Afficher detail</a>
                                              <a href="#del-{{$reservation->idReservation}}"  class="btn btn-info" data-toggle="modal">Annuler</a>
                                            </td>
                                          </tr>
                                        @endforeach 

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
               
                <!-- #END# Browser Usage -->
            </div>



<!-- Modal -->
@foreach($reservations as $reservation)
<div class="modal fade" id="{{$reservation->idReservation}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$reservation->designation}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-6">
                  <tr>
                  <h4> <small class="text-info">Montant/jour:</small>&nbsp;{{$reservation->montant_journalier}} cfa</h4>
                  </tr>
                  <br>
                <h4><small class="text-info">date d'arrivé</small> {{ $reservation->pdate_debut }}</h4>
                <br>
                <h4>
                    <small class="text-info">date de fin</small> {{ $reservation->pdate_fin }}</h4>
            </div>
            <div class="col-xs-6">
                <img src="{{asset('images/properties-1.jpg')}}" class="img-fluid rounded mx-auto d-block" width="250px">
            </div>

          </div>
         
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

@endforeach


@foreach($reservations as $reservation)
<div class="modal fade" id="del-{{$reservation->idReservation}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Annuler {{$reservation->designation}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-warning">êtes-vous sûr de vouloir annuler votre reservation?</h4>
      </div>
      <div class="modal-footer">
      <a href="{{route('reservation.annuler',['id' => $reservation ->idReservation ])}}" type="button" class="btn btn-danger">Oui</a>
        <button  class="btn btn-primary" data-dismiss="modal">Non</button>
   

      </div>
    </div>
  </div>
</div>

@endforeach
</section>
@endsection