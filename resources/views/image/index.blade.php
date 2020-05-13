@extends('layouts/templatesbackend')

@section('content')
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
             <h3 class="mb-5 text-center">Galerie Images</h3>
              @if ($images)
              <div class="row">
                  <div class="col-12">
                  <a href="{{ route('image.create') }}" class="btn btn-primary mb-5">
                      <i class="fa fa-image"></i> 
                       Ajouter une Image
                    </a>
                    <div class="row portfolio-grid">
                    
                      @foreach ($images as $image)
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                        
                        <figure class="effect-text-in">
                          
                          <?php $photo = empty($image->filename) ? 'default.png' : $image->filename;?>
                         <img src="/images/{{ $photo }}" alt="{{ $image->name }}" width="300"/> 
                          
                          <figcaption>
                            <h4>{{ $image->name }}</h4>
                            <p>
                                {{ $image->description }}
                                <a  href="image/{{ $image->id }}/edit"  class=" btn-sm btn btn-primary">Edit</a>
                                <button type="submit" class="btn-sm btn btn-danger"  data-toggle="modal" data-target="#mb-delete_{{ $image->id }}">Delete</button>
                            </p>
                          </figcaption>
                        </figure>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              @else
              <div class="d-flex justify-content-center ml-3">
                  <a href="/images/create" class=" mt-5  btn btn-outline-dark">Aouter un media</a>   
              </div>
              <p class="text-center mt-5">Aucune Donnée disponible</p>
              @endif
               <div class="d-flex justify-content-center">
                  {{ $images->links() }}
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>

          @foreach ($images as $image)
          <div class="modal fade" id="mb-delete_{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title login-title" id="myModalLabel">Supprimer {{ $image->name }}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              
                          </div>
                          <div class="modal-body">
                              <p>La suppression est irréverssible!!!.
                                  Voulez-vous vraiment Supprimer cetle ligne ?</p>
                          </div>
                          <div class="modal-footer">
                              <button class="btn btn-default" data-dismiss="modal" type="button">
                                  <i class="fa fa-reply"></i> Annuler
                              </button>
    

                               <form action="{{ route('image.destroy', $image->id) }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-success">Valider</button>
                                </form>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach
            
@endsection