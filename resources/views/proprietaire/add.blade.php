@extends('layouts.hearder')
@section('content')

<section class="content">
        <div class="container-fluid">
     
                <div class="card col-md-8 offset-md-2">
                  <div class="card-body">
                    <h4 class="card-title">Ajout d'un appartement</h4>
                    <div class="row">
                      <div class="col-md-12">
                       
                        <form action="{{ route('appartementAdd.store') }}" method="POST" class="form-sample"  enctype="multiple">
                         @csrf
                           @include('appartement/addForm')
                        </form>
                           
                       
                        </div>
                    </div>
                  </div>
            
</section>
@endsection