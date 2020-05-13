@extends('layouts/templatesbackend')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card col-md-8 offset-md-2">
                  <div class="card-body">
                    <h4 class="card-title">Modifier la  Disponilité</h4>
                       
                    <a href="{{ route('appartement.index') }}" class="btn btn-primary my-3">Liste des Appartements</a>
                    <div class="row">
                        

                      <div class="col-md-12">
                       
                        <form action="{{ route('disponibilite.update', ['disponibilite'=>$disponibilite->id, 'appartement_id'=>$appartement_id ]) }}" method="POST" class="form-sample" >
                         @csrf
                           @include('disponibilite/form')
                           <input type="hidden" name="_method" value="PATCH">
                        </form>
                           
                       
                        </div>
                    </div>
                  </div>
                </div>
              </div>
    
@endsection