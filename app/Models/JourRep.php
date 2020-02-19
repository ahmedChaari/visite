<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JourRep extends Model
{
    

    protected $table = 'vp_jours_rep';

    public function Calandrier()
    
        {
            return $this->hasMany('App\Calandrier');
        }      
}
