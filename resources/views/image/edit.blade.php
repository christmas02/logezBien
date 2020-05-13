@extends('layouts/templatesbackend')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Formulaire de Modification</h4>
                    <div class="row">
                      <div class="col-12">
                       
                            <form action="{{ route('image.update', ['image'=>$image->id, 'appartement_id'=>$appartement_id]) }}" enctype="multipart/form-data" method="POST" class="forms-sample">
                              @csrf
                              <input type="hidden" name="_method" value="PATCH">
                              @include('image/form')
                            </form>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
@endsection