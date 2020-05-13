@extends('layouts/templatesbackend')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card col-md-8 offset-md-2">
                  <div class="card-body">
                    <h4 class="card-title">Ajout d'un appartement</h4>
                    <div class="row">
                      <div class="col-md-12">
                       
                        <form action="{{ route('appartementAdd.add') }}" method="POST" class="form-sample"  enctype="multiple">
                         @csrf
                           @include('appartement/form')
                        </form>
                           
                       
                        </div>
                    </div>
                  </div>
                </div>
              </div>
    
@endsection