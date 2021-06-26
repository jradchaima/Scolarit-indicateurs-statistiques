<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    protected $table='communications';
    protected $fillable=['type_comun','nb_comun','responsable','id_etabl','id_region','id_centrale'];
}


