<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appartement extends Model
{
     //Table name
      protected $table = 'appartements';
      //Primary key
      protected $primaryKey = 'id';
      //Timestamps
      public $timestamps = true;

      protected $guarded = [];


      public function images()
      {
          return $this->hasMany('App\Image');
      }

      public function commune()
      {
          return $this->belongsTo('App\Commune');
      }

      public function user()
      {
          return $this->belongsTo('App\User');
      }

      public function disponibilite()
      {
          return $this->hasOne('App\Disponibilite');
      }

       public function reservation(){
           return $this->hasOne('App\Reservation');
      }
}
