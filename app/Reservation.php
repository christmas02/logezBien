<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
      //Table name
      protected $table = 'reservations';
      //Primary key
      protected $primaryKey = 'idReservation';
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
