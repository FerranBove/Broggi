<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = 'incidencies'; //enlaza la tabla sexo con el modelo sexo
    protected $primaryKey = 'id'; //le ponemos como se llama la clave primaria de la tabla
    public $incrementing = true; //la clave primaria es incremental
    protected $keyType = 'int';// tipo de dato de primaryKey
    public $timestamps = false; //si tiene timestamp o no

    // N/N incidencies_has_afectats (afectats)
    public function incidencies_has_afectats()//tambla donde vamos
    {
        return $this->belongsToMany('App\Models\Afectat','incidencies_has_afectats','incidencies_id','afectats_id'); // (tabla relacionada,la tabla que se a creado a partir de las dos ,id de una tabla,id de la otra(los campos que hay en la tabla creada en la BD))
    }
    // N/1 tipus_incident
    public function tipus_incident()
    {
        return $this->belongsTo('App\Models\Tipo_Incident', 'tipus_incident_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }
    // N/N incidencies_has_recurs (recurs)
    public function incidencies_has_recurs()//tambla donde vamos
    {
        return $this->belongsToMany('App\Models\Recurs','incidencies_has_recursos','incidencies_id','recursos_id')->withPivot('prioritat',
                                                                                                                              'hora_activacio',
                                                                                                                              'hora_mobilitzacio',
                                                                                                                              'hora_assistencia',
                                                                                                                              'hora_transport',
                                                                                                                              'hora_arribada_hospital',
                                                                                                                              'hora_transferencia',
                                                                                                                              'hora_finalitzacio');
    }
    // N/N incidencies_has_usuaris (usuaris)
    public function incidencies_has_usuaris()//tambla donde vamos
    {
        return $this->belongsToMany('App\Models\Usuari','incidencies_has_usuaris','incidencies_id','usuaris_id');
    }
    // N/1 tipus_alertant
    public function tipus_alertants()
    {
        return $this->belongsTo('App\Models\Tipo_alertant', 'tipus_alertant_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }
    // N/1 estats_incidencies
    public function estats_incidencies()
    {
        return $this->belongsTo('App\Models\Estat_Incidencia', 'estats_incidencies_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }

    // N/1 alertants
    public function alertants()
    {
        return $this->belongsTo('App\Models\Alertant', 'alertants_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }
    // N/1 municipis
    public function municipis()
    {
        return $this->belongsTo('App\Models\Municipi', 'municipis_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }
}