
<div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Nom</label>
          <div class="col-sm-9">
            <input type="text" name="name"  id="libelle" class="form-control" value="{{ (empty($user)) ? old('name') : $commune->user }}" placeholder="Entrez le nom de l'utilisateur">
            <br>
            @if (!empty($errors->has('name')))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
            @endif
         </div>
</div>

<div class="form-group row">
          <label for="email" class="col-sm-3 col-form-label">Email</label>   
          <div class="col-sm-9">
            <input type="text" name="email"  id="libelle" class="form-control" value="{{ (empty($user)) ? old('name') : $user->name }}" placeholder="Entrez l'email">
            <br>
            @if (!empty($errors->has('email')))
            <div class="alert alert-danger">
                {{ $errors->first('email') }}
            </div>
            @endif
         </div>
</div>

<div class="form-group row">
          <label for="password" class="col-sm-3 col-form-label">Mot de passe</label>   
          <div class="col-sm-9">
            <input type="paswword" name="password"  id="password" class="form-control" value="" placeholder="Entrez le mot de passe">
            <br>
            @if (!empty($errors->has('password')))
            <div class="alert alert-danger">
                {{ $errors->first('password') }}
            </div>
            @endif
         </div>
</div>

<div class="form-group row">
          <label for="password" class="col-sm-3 col-form-label">Confirmation du mot de passe</label>   
          <div class="col-sm-9">
            <input type="password" name="password_confirmation"  id="password" class="form-control" value="" placeholder="confirmer le mot de passe">
            <br>
            @if (!empty($errors->has('password')))
            <div class="alert alert-danger">
                {{ $errors->first('password') }}
            </div>
            @endif
         </div>
</div>
<!--<div class="form-group form-check row ml-4">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            Se souvenir de moi
        </label>

</div>-->

<div class="form-group row">
 <label for="Libelle" class="col-sm-3 col-form-label">Role</label>
   <div class="col-sm-9">
        <select name="role" id="role" class="form-control" id="formselect2">
            <option value="admin">Admin</option>
            <option value="proprietaire">Proprietaire</option>
            <option value="client">Client</option>

        </select>
    </div>
</div>

<button type="submit" class="btn btn-primary pull-right">Ajouter</button>