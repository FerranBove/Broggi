<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Usuari extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuaris'; //enlaza la tabla sexo con el modelo sexo
    // protected $primaryKey = 'id'; //le ponemos como se llama la clave primaria de la tabla
    // public $incrementing = true; //la clave primaria es incremental
    // protected $keyType = 'int';// tipo de dato de primaryKey
    // public $timestamps = false; //si tiene timestamp o no

    // N/1 rols
    public function rols()
    {
        return $this->belongsTo('App\Models\Rol', 'rols_id'); //la tabla que esta relacionada y el campo donde se va a guardar
    }

    // 1/N recursos
    public function recursos()
    {
        return $this->hasMany('App\Models\Recurs','id_usuario'); // (lugar donde se encuentra, foreign key, como se llama el campo donde se va a guardar)
    }

    // N/N incidencies_has_usuaris
    public function incidencies_has_usuaris()//tambla donde vamos
    {
        return $this->belongsToMany('App\Models\Incidencia','incidencies_has_usuaris','usuaris_id','incidencies_id'); //primer el de la classe on estem i despres l'altre
    }
}