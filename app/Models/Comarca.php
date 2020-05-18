<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comarca extends Model
{
    protected $table = 'comarques'; //enlaza la tabla sexo con el modelo sexo
    protected $primaryKey = 'id'; //le ponemos como se llama la clave primaria de la tabla
    public $incrementing = true; //la clave primaria es incremental
    protected $keyType = 'int';// tipo de dato de primaryKey
    public $timestamps = false; //si tiene timestamp o no

    // N/1 provincies
    public function provincies()
    {
        return $this->belongsTo('App\Models\Provincia', 'provincies_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }

    // 1/N municipis
    public function municipis()
    {
        return $this->hasMany('App\Models\Municipi','comarques_id'); // (lugar donde se encuentra, foreign key, como se llama el campo donde se va a guardar)
    }
}