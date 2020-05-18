<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afectat extends Model
{
    protected $table = 'afectats'; //enlaza la tabla sexo con el modelo sexo
    protected $primaryKey = 'id'; //le ponemos como se llama la clave primaria de la tabla
    public $incrementing = true; //la clave primaria es incremental
    protected $keyType = 'int';// tipo de dato de primaryKey
    public $timestamps = false; //si tiene timestamp o no



    // N/1 con municipis
    public function municipis()
    {
        return $this->belongsTo('App\Models\Municipi', 'municipis_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }

    // N/N incidencies_has_afectats (afectats)
    public function incidencies_has_afectats()//tambla donde vamos
    {
        return $this->belongsToMany('App\Models\Incidencia','incidencies_has_afectats','afectats_id','incidencies_id'); // (tabla relacionada,la tabla que se a creado a partir de las dos ,id de una tabla,id de la otra(los campos que hay en la tabla creada en la BD))
    }

}