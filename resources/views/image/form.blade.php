{{ $errors }}
<input type="hidden" name="appartement_id" value="{{ $appartement_id }}">

<div class="form-group row">
  <label class="col-sm-3 col-form-label">Image</label>
    <input type="file" name="filename" class="file-upload-default">
        <div class="input-group col-sm-9">
            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
            <span class="input-group-append">
            <button class="file-upload-browse btn btn-success" type="button">Télécharger</button>
            </span>
             
        </div>
         @if (!empty($errors->has('filename')))
                <div class="alert alert-danger">
                    {{ $errors->first('filename') }}
                </div>
         @endif

       
</div>

 <div class="form-group row">
    <label for="nom" class="col-sm-3 col-form-label">Nom</label> 
    
    <div class="col-sm-9">
        
        
        <input type="text" name="name" value="{{ (empty($image)) ? old('name') : $image->name }}" id="nom" class="form-control" placeholder="Entrez le libellé de l'image">
        <br>
        @if (!empty($errors->has('name')))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>

 </div>

<div class="form-group row">

    <label for="Description" class="col-sm-3 col-form-label">Description</label> 
        <div class="col-sm-9">
            Nb: (*la description est falcutative)
            <textarea name="description" id="editor" cols="30" rows="10" placeholder="Description de l' article"><?= (empty($image)) ? old('description') : $image->description; ?></textarea>
            <br>
            @if (!empty($errors->has('description')))
                <div class="alert alert-danger">
                {{ $errors->first('description') }}
                </div>
            @endif
        </div>  
</div>


<button class="btn btn-success mr-2">Enregistrer</button>