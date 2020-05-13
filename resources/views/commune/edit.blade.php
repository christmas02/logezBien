@extends('layouts/templatesbackend')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card col-md-8 offset-md-2">
                  <div class="card-body">
                    <h4 class="card-title">Ajout de Commune</h4>
                       
                    <a href="{{ route('commune.index') }}" class="btn btn-primary my-3">Liste des communes</a>
                    <div class="row">
                        

                      <div class="col-md-12">
                       
                        <form action="{{ route('commune.update', $commune->id) }}" method="POST" class="form-sample" >
                         @csrf
                           @include('commune/form')
                           <input type="hidden" name="_method" value="PATCH">
                        </form>
                           
                       
                        </div>
                    </div>
                  </div>
                </div>
              </div>
    
@endsection