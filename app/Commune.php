<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    
      //Table name
      protected $table = 'communes';
      //Primary key
      protected $primaryKey = 'id';
      //Timestamps
      public $timestamps = true;
  
      //   protected $fillable = [
      //       'libelle',
      //   ];

      protected $guarded = [];

      public function appartements()
      {
        return $this->hasMany('App\Appartement');
      }
}
