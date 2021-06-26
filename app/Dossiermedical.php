<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossiermedical extends Model
{
    protected $table='dossiermedicals';
    protected $fillable=['nom_etudient','prenom_etudient','handicape','maladie_chronique','autre_maladie','id_etabl','id_region','id_centrale'];
}
