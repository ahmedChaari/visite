<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeGroupe extends Model
{
   
    protected $table = 'vp_type_groupe';
    protected $fillable  = [
        'id',
        'libelle',
        'libelle_ar'
            ];
        public function Hemicycle()
        {
            return $this->hasMany('App\Hemicycle');
        }
}
