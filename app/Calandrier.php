<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calandrier extends Model
{
    protected $table    = 'vp_calandrier';
    protected $fillable  = [
        'libelle',
        'start_time','end_time',
        'repitition','jour_rep',
        'heure_rep'
            ];

            public function Repetition()
                {
                    return $this->belongsTo('App\Models\Repetition');
                }
                public function JourRep()
                {
                    return $this->belongsTo('App\Models\JourRep');
                }
                        public function Hemicycle()
                {
                    return $this->hasMany('App\Hemicycle');
                }
}
