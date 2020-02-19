<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hemicycle extends Model
{


    protected $table    = 'vp_demandeurs';
    protected $fillable  = ['id',
                            'nom','prenom',
                            'nom_ar','prenom_ar',
                            'identite_type_id','n_cin',
                            'email','tel','nombre_tot',
                            'typeGroupe',
                            'provenance', 'type_demandeur',
                            'visite_date','status','libelle',
                            'type_visit','type_groupe'];

                            public function IdentiType()
                            {
                                return $this->belongsTo('App\Models\IdentiType');
                            }
                            public function TypeGroupe()
                            {
                                return $this->belongsTo('App\Models\TypeGroupe');
                            }
                            public function Calandrier()
                            {
                                return $this->belongsTo('App\Calandrier');
                            }
   
   
}

