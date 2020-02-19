<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NatureGroupe extends Model
{
    

    protected $table = 'vp_nature_groupe';

    public function Bibliotheque()
    
        {
            return $this->hasMany('App\Bibliotheque');
        }
        public function Pavillon()
    
        {
            return $this->hasMany('App\Pavillon');
        }

        public function Hemicycle()
    
        {
            return $this->hasMany('App\Hemicycle');
        }
}
