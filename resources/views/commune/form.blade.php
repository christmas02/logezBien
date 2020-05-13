<div class="form-group row">
           <label for="Libelle" class="col-sm-3 col-form-label">Libelle</label> 
          
          <div class="col-sm-9">
           
            
            <input type="text" name="libelle"  id="libelle" class="form-control" value="{{ (empty($commune)) ? old('libelle') : $commune->libelle }}" placeholder="Entrez le libelle de la commune">
            <br>
            @if (!empty($errors->has('libelle')))
            <div class="alert alert-danger">
                {{ $errors->first('libelle') }}
            </div>
            @endif
         </div>
</div>

<button class="btn btn-primary mr-2" type="submit">Enregistrer</button>