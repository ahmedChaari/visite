<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repetition extends Model
{
    protected $table = 'vp_repetition';
    protected $fillable  = [
        'id',
        'libelle',
        'libelle_ar'
            ];
    
        public function Calandrier()
    
        {
            return $this->hasMany('App\Calandrier');
        }
}

