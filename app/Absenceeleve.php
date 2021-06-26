<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absenceeleve extends Model
{
    protected $table='absenceeleves';
    protected $fillable=['nb_abs','nbj_abs','type_abs','niveau','id_etabl','id_region','id_centrale'];
}
