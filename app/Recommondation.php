<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommondation extends Model
{
    protected $table='recommondations';
    protected $fillable=['recom','id_etabl','id_region','id_centrale'];
}
