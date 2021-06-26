<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
     protected $table='activites';
    protected $fillable=['type_activite','nb_activite','nb_eleve','id_etabl','id_region','id_centrale'];
}
