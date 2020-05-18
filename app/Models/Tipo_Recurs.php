<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Recurs extends Model
{
    protected $table = 'tipus_recurs'; //enlaza la tabla sexo con el modelo sexo
    protected $primaryKey = 'id'; //le ponemos como se llama la clave primaria de la tabla
    public $incrementing = true; //la clave primaria es incremental
    protected $keyType = 'int';// tipo de dato de primaryKey
    public $timestamps = false; //si tiene timestamp o no

    // 1/1 recursos
    public function recursos()
    {
        return $this->hasMany('App\Models\Recurs','tipus_recurs_id'); // (lugar donde se encuentra, foreign key, como se llama el campo donde se va a guardar)
    }
}