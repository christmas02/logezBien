@extends('layouts/templatesbackend')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
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
                    <h3 class="card-title text-center mb-5">Liste des proprietaires</h3>
                     <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Ajouter une proprietaire</a>
                    <div class="row">
                      <div class="col-12 table-responsive">
                          <table class="table table-bordered table-hover table-sm center" id="example2">
                            <thead >
                                <tr class="bg-secondary">
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $i=0; ?>
                                    @foreach ($users as $user)
                                    <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $user->name }} </td>
                                            <td>{{ $user->email }} </td>
                                            <td>
                                            {{$user->role}}
                                            </td>
                                            
                                            <td>
                                            
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#mb-delete_{{ $user->id }}"><i class=" icon-trash"></i></button>
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
    
             

            @foreach ($users as $user)
            <div class="modal fade" id="mb-delete_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title login-title" id="myModalLabel">Supprimer {{ $user->libelle }}</h4>
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
                               
                                <form action ="{{  route('user.destroy', $user->id) }}" method="POST">
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