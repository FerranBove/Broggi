<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alertant extends Model
{
    protected $table = 'alertants'; //enlaza la tabla sexo con el modelo sexo
    protected $primaryKey = 'id'; //le ponemos como se llama la clave primaria de la tabla
    public $incrementing = true; //la clave primaria es incremental
    protected $keyType = 'int';// tipo de dato de primaryKey
    public $timestamps = false; //si tiene timestamp o no

    // 1/1 municipis
    public function municipis()
    {
        return $this->belongsTo('App\Models\Municipi', 'municipis_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }

    // 1/1 incidencies
    public function incidencies()
    {
        return $this->hasMany('App\Models\Incidencia','alertants_id'); // (lugar donde se encuentra, foreign key, como se llama el campo donde se va a guardar)
    }
    // 1/1 tipus_alertant
    public function sexo()
    {
        return $this->belongsTo('App\Models\Sexo', 'id_sexo');
    }

}