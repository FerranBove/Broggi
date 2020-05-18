<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipi extends Model
{
    protected $table = 'municipis'; //enlaza la tabla sexo con el modelo sexo
    protected $primaryKey = 'id'; //le ponemos como se llama la clave primaria de la tabla
    public $incrementing = true; //la clave primaria es incremental
    protected $keyType = 'int';// tipo de dato de primaryKey
    public $timestamps = false; //si tiene timestamp o no

    // 1/N alertants
    public function alertants()
    {
        return $this->hasMany('App\Models\Alertant','municipis_id'); // (lugar donde se encuentra, foreign key, como se llama el campo donde se va a guardar)
    }

    // N/1 comarques
    public function comarques()
    {
        return $this->belongsTo('App\Models\Comarca', 'comarques_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }

    // 1/N afectats
    public function afectats()
    {
        return $this->hasMany('App\Models\Afectat','municipis_id'); // (lugar donde se encuentra, foreign key, como se llama el campo donde se va a guardar)
    }

    // 1/N incidencies
    public function incidencies()
    {
        return $this->hasMany('App\Models\Incidencia','municipis_id'); // (lugar donde se encuentra, foreign key, como se llama el campo donde se va a guardar)
    }
}