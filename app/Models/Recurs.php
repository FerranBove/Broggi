<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurs extends Model
{
    protected $table = 'recursos'; //enlaza la tabla sexo con el modelo sexo
    protected $primaryKey = 'id'; //le ponemos como se llama la clave primaria de la tabla
    public $incrementing = true; //la clave primaria es incremental
    protected $keyType = 'int';// tipo de dato de primaryKey
    public $timestamps = false; //si tiene timestamp o no

    // 1/1 tipus_recurs
    public function tipus_recurs()
    {
        return $this->belongsTo('App\Models\Tipo_Recurs', 'tipus_recurs_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }
    // N/N incidencies_has_recurs (recurs)
    public function incidencies_has_recurs()//tambla donde vamos
    {
        return $this->belongsToMany('App\Models\Incidencia','incidencies_has_recursos','recursos_id','incidencies_id')->withPivot('prioritat',
                                                                                                                              'hora_activacio',
                                                                                                                              'hora_mobilitzacio',
                                                                                                                              'hora_assistencia',
                                                                                                                              'hora_transport',
                                                                                                                              'hora_arribada_hospital',
                                                                                                                              'hora_transferencia',
                                                                                                                              'hora_finalitzacio');
    }
    // 1/N usuari
    public function usuaris()
    {
        return $this->belongsTo('App\Models\Usuari', 'id_usuario'); //la tabla que esta relacionada y el campo donde se va a guardar
    }
}