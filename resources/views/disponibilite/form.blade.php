<div class="form-group row">
           <label for="Libelle" class="col-sm-3 col-form-label">Date</label> 
          
          <div class="col-sm-9">
             @if(!empty($disponibilite))
             <?php $date_debut = date('m/d/Y', strtotime($disponibilite->date_debut))?>
             @endif
            <input type="text" name="date_debut"  id="startDate" class="form-control" value="{{ (empty($disponibilite)) ? old('date_debut') : $date_debut }}" placeholder="Entrez la date de debut">
            <br>
            @if (!empty($errors->has('date_debut')))
            <div class="alert alert-danger">
                {{ $errors->first('date_debut') }}
            </div>
            @endif
         </div>
</div>


<div class="form-group row">
           <label for="Libelle" class="col-sm-3 col-form-label">Date de fin</label> 
          
          <div class="col-sm-9">
             @if(!empty($disponibilite))       
             <?php $date_fin = date('m/d/Y', strtotime($disponibilite->date_fin))?>
             @endif  
            <input type="text" name="date_fin"  id="endDate" class="form-control" value="{{ (empty($disponibilite)) ? old('date_fin') : $date_fin }}" placeholder="Entrez la date de fin">
            <br>
            @if (!empty($errors->has('date_fin')))
            <div class="alert alert-danger">
                {{ $errors->first('date_fin') }}
            </div>
            @endif
         </div>
</div>

<input type="hidden" name="appartement_id" value="{{ $appartement_id }}">

<button class="btn btn-primary mr-2" type="submit">Enregistrer</button>