<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absenceenseg extends Model
{
    protected $table='absenceensegs';
    protected $fillable=['nb_abs','nbj_abs','type_abs','id_etabl','id_region','id_centrale'];
}
