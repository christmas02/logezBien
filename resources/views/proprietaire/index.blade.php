
@extends('layouts/hearder')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
          
                <div class="row">
                  <div class="col-md-4 col-lg-4 grid-margin stretch-card">
                    <div class="card bg-dark text-white border-0">
                      <a href="#" class="a-none text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                              <i class="icon-wallet icon-lg"></i>
                              <div class="ml-4">
                                <h4 class="font-weight-light">Reservations</h4>
                                <h3 class="font-weight-light mb-3"></h3>
                                 <p class="mb-0 font-weight-light">{{ $nbre_reservation }}</p> 
                              </div>
                            </div>
                          </div>
                      </a>
                      
                    </div>
                  </div>
                  <div class="col-md-4 col-lg-4 grid-margin stretch-card">
                    <div class="card bg-primary text-white border-0">
                      <a href="#" class="a-none text-white">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <i class=" icon-home icon-lg"></i>
                          <div class="ml-4">
                            <h4 class="font-weight-light">Nombre de Résidences Meublés</h4>
                            <h3 class="font-weight-light mb-3"></h3>
                             <p class="mb-0 font-weight-light">{{ $nbre_appart }}</p> 
                          </div>
                        </div>
                      </div>
                       </a>
                    </div>
                  </div>
                  <div class="col-md-4 col-lg-4 grid-margin stretch-card">
                    <div class="card bg-success text-white border-0">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <i class=" icon-calendar icon-lg"></i>
                          <div class="ml-4">
                            <h4 class="font-weight-light"><?= ucfirst(utf8_encode(strftime('%A', strtotime(date('d-m-Y'))))); ?></h4>
                            <h3 class="font-weight-light mb-3"><?= ucfirst(utf8_encode(strftime(' %d %B', strtotime(date('d-m-Y'))))); ?></h3>
                            <p class="mb-0 font-weight-light"><?= ucfirst(utf8_encode(strftime(' %Y ', strtotime(date('d-m-Y'))))); ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bienvenue dans votre Espace d'administration   {{ Auth::user()->name }}   </h4>
                    <div class="row">
                      <div class="col-12">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
@endsection