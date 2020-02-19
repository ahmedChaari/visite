<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibliotheque extends Model
{
    protected $table    = 'vp_demandeurs';
    protected $fillable  = ['nom','prenom',
        'nom_ar','prenom_ar',
        'email', 
        'tel',
        'select_file_cin','select_file_ce',
        'visite_date', 'visite_heure',
        'domaine_cher','status',
        'n_cin','identite_type_id',
        'type_visit'];
        public function IdentiType()
            {
                return $this->belongsTo('App\Models\IdentiType');
            }
}
     
