<p class="my-1"><b>Visite de l'appartement</b></p>
 <hr>
         <div class="form-group row">
            <label for="linkvideo" class="col-sm-3 col-form-label">Lien Video</label> 
            
            <div class="col-sm-9">  
                <input type="text" name="linkvideo"  id="linkvideo" class="form-control" value="{{ (empty($appartement)) ? old('linkvideo') : $appartement->linkvideo }}" placeholder="Entrez le nombre de salle d'eau de l'appartement">
                <br>
                @if (!empty($errors->has('linkvideo')))
                <div class="alert alert-danger">
                    {{ $errors->first('linkvideo') }}
                </div>
                @endif
            </div>
         </div>

         <div class="form-group row">
            <label for="visite3d" class="col-sm-3 col-form-label">Video 3D</label> 
            
            <div class="col-sm-9">  
                <input type="text" name="visite3d"  id="visite3d" class="form-control" value="{{ (empty($appartement)) ? old('visite3d') : $appartement->visite3d }}" placeholder="Entrez le lien de la video 3d de l'appartement">
                <br>
                @if (!empty($errors->has('visite3d')))
                <div class="alert alert-danger">
                    {{ $errors->first('visite3d') }}
                </div>
                @endif
            </div>
         </div>

<p class="my-1"><b>Information </b></p>
<hr>

        <div class="form-group row">
            <label for="ref" class="col-sm-3 col-form-label">Référence</label> 
            
            <div class="col-sm-9">  
                <input type="text" name="ref"  id="ref" class="form-control" value="{{ (empty($appartement)) ? old('ref') : $appartement->ref }}" placeholder="Entrez la référence de l'appartement">
                <br>
                @if (!empty($errors->has('ref')))
                <div class="alert alert-danger">
                    {{ $errors->first('ref') }}
                </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="designation" class="col-sm-3 col-form-label">Désignation</label> 
            
            <div class="col-sm-9">  
                <input type="text" name="designation"  id="designation" class="form-control" value="{{ (empty($appartement)) ? old('designation') : $appartement->designation }}" placeholder="Entrez la désignation">
                <br>
                @if (!empty($errors->has('designation')))
                <div class="alert alert-danger">
                    {{ $errors->first('designation') }}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
              
            <label for="localisation" class="col-sm-3 col-form-label">Localisation</label> 
            <div class="col-sm-9">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control">
                <select name="commune_id" id="commune" class="form-control" id="formselect2">
                    <option value="aucun">----Aucun----</option>
                    @foreach($communes as $commune =>$key)  
                    <option value="{{ $commune }}" {{ ($selected == $commune) ? 'selected = "selected"' : '' }}>{{ $key  }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        




         <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Description</label> 
            
            <div class="col-sm-9">  
                <textarea  name="description"  id="editor" class="form-control" placeholder="Entrez la description de l'appartement">{{ (empty($appartement)) ? old('description') : $appartement->description }}</textarea>
                <br>
                @if (!empty($errors->has('description')))
                <div class="alert alert-danger">
                    {{ $errors->first('description') }}
                </div>
                @endif
            </div>
         </div>   

        <div class="form-group row">
            <label for="superficie" class="col-sm-3 col-form-label">Superficie</label> 
            
            <div class="col-sm-9">  
                <input type="text" name="superficie"  id="superficie" class="form-control" value="{{ (empty($appartement)) ? old('superficie') : $appartement->superficie }}" placeholder="Entrez la superficie de l'appartement">
                <br>
                @if (!empty($errors->has('superficie')))
                <div class="alert alert-danger">
                    {{ $errors->first('superficie') }}
                </div>
                @endif
            </div>
        </div>

         <div class="form-group row">
            <label for="type" class="col-sm-3 col-form-label">Type d'appartement</label> 
            
            <div class="col-sm-9">  
                <select name="type" id="type" class="form-control" id="formselect2">
                    <option value="studio">Studio</option>
                    <option value="appartement">Appartement</option>
                    <option value="villa">Villa</option>
                </select>               
                <br>
                @if (!empty($errors->has('type')))
                <div class="alert alert-danger">
                    {{ $errors->first('type') }}
                </div>
                @endif
            </div>
        </div>

         <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Montant Journalier</label> 
            
            <div class="col-sm-9">  
                <input type="text" name="montant_journalier"  id="" class="form-control" value="{{ (empty($appartement)) ? old('journalier') : $appartement->journalier }}" placeholder="Entrez le montant journalier de la résidence">
                <br>
                @if (!empty($errors->has('montant_journalier')))
                <div class="alert alert-danger">
                    {{ $errors->first('montant_journalier') }}
                </div>
                @endif
            </div>
          </div>


 <p class="my-1"><b> description de la localisation</b></p>
 <hr>
  <div class="form-group row">
                <label for="libelle" class="col-sm-3 col-form-label">localisation de l'appartemnt</label> 
                
                <div class="col-sm-9">  
                    <input type="text" name="libelle"  id="libelle" class="form-control" value="{{  old('libelle') }}" placeholder="Entrez la localisation de l'appartement">
                    <br>
                    @if (!empty($errors->has('libelle')))
                    <div class="alert alert-danger">
                        {{ $errors->first('libelle') }}
                    </div>
                    @endif
                </div>
    </div>


 <p class="my-1"><b>Nombre de Pièces</b></p>
 <hr>
        <div class="form-group row">
                <label for="libelle" class="col-sm-3 col-form-label">Salon</label> 
                
                <div class="col-sm-9">  
                    <input type="text" name="salon"  id="salon" class="form-control" value="{{ (empty($appartement)) ? old('salon') : $appartement->salon }}" placeholder="Entrez le nombre de salons de l'appartement">
                    <br>
                    @if (!empty($errors->has('salon')))
                    <div class="alert alert-danger">
                        {{ $errors->first('salon') }}
                    </div>
                    @endif
                </div>
        </div>

        <div class="form-group row">
            <label for="chambre" class="col-sm-3 col-form-label">Chambre</label> 
            
            <div class="col-sm-9">  
                <input type="text" name="chambre"  id="chambre" class="form-control" value="{{ (empty($appartement)) ? old('chambre') : $appartement->chambre }}" placeholder="Entrez le nombre de chambres de l'appartement">
                <br>
                @if (!empty($errors->has('chambre')))
                <div class="alert alert-danger">
                    {{ $errors->first('chambre') }}
                </div>
                @endif
            </div>
        </div>

         <div class="form-group row">
            <label for="salle_eau" class="col-sm-3 col-form-label">Salle d'eau</label> 
            
            <div class="col-sm-9">  
                <input type="text" name="salle_eau"  id="salle_eau" class="form-control" value="{{ (empty($appartement)) ? old('salle_eau') : $appartement->salle_eau }}" placeholder="Entrez le nombre de salle d'eau de l'appartement">
                <br>
                @if (!empty($errors->has('salle_eau')))
                <div class="alert alert-danger">
                    {{ $errors->first('salle_eau') }}
                </div>
                @endif
            </div>
         </div>


         
        
  



        <button class="btn btn-primary mr-2" type="submit">Enregistrer</button>