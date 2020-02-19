<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pavillon extends Model
{
    protected $table    = 'vp_demandeurs';
    protected $fillable  = [
                    'nom','prenom',
                    'nom_ar','prenom_ar',
                    'identite_type_id','n_cin',
                    'email','tel' ,'visite_heure',
                    'type_demandeur' ,'visite_date' ,
                    'nombre_tot' ,'nombre_mineur','provenance',
                    'nombre_feminin','typeGroupe','type_visit',
                    'type_groupe','nom_groupe','typeGroupe',
                    'natureGroupe','status'
                ];
                public function IdentiType()
                {
                    return $this->belongsTo('App\Models\IdentiType');
                }
                public function TypeGroupe()
                {
                    return $this->belongsTo('App\Models\TypeGroupe');
                }
                public function NatureGroupe()
                {
                    return $this->belongsTo('App\Models\NatureGroupe');
                }
}

