<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     //Table name
      protected $table = 'images';
      //Primary key
      protected $primaryKey = 'id';
      //Timestamps
      public $timestamps = true;
  
      //   protected $fillable = [
      //       'libelle',
      //   ];

      protected $guarded = [];

      public function appartement()
      {
        return $this->belongsTo('App\Appartement');
      }
}
