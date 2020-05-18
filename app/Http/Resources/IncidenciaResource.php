<?php

namespace App\Http\Resources;

use App\Http\Resources\MunicipiResource;
use Illuminate\Http\Resources\Json\JsonResource;

class IncidenciaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

class IncidenciaNomMunicipiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'id' => $this->id,
        'num_incidencia' => $this->num_incidencia,
        'telefon_alertant' => $this->telefon_alertant,
        'data' => $this->data,
        'hora' => $this->hora,
        'adreca' => $this->adreca,
        'complement_adreca' => $this->complement_adreca,
        'descripcio' => $this->descripcio,
        'municipis_id' => $this->municipis_id,
        'tipus_incident_id' => $this->tipus_incident_id,
        'estats_incidencia' => $this->id,
        'tipus_alertant_id' => $this->id,
        'alertants_id' => $this->id,
        'municipis' => new MunicipiResource($this->municipi)
        ];
    }
}