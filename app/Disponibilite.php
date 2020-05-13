<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
     //Table name
      protected $table = 'disponibilites';
      //Primary key
      protected $primaryKey = 'id';
      //Timestamps
      public $timestamps = true;
  
      //   protected $fillable = [
      //       'libelle',
      //   ];

      protected $guarded = [];
      
      public function appartement(){
           return $this->belongsTo('App\Appartement');
      }
}
