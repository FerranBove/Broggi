<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Incident extends Model
{
    protected $table = 'tipus_incident'; //enlaza la tabla sexo con el modelo sexo
    protected $primaryKey = 'id'; //le ponemos como se llama la clave primaria de la tabla
    public $incrementing = true; //la clave primaria es incremental
    protected $keyType = 'int';// tipo de dato de primaryKey
    public $timestamps = false; //si tiene timestamp o no

    // 1/N incidencies
    public function incidencies()
    {
        return $this->hasMany('App\Models\Incidencia','tipus_incident_id'); // (lugar donde se encuentra, foreign key, como se llama el campo donde se va a guardar)
    }
}