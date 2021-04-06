<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FieldResource extends JsonResource
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
            'id' => $this->resource['oborIdno'],
            'title' => $this->resource['nazev'],
            'lang' => $this->resource['jazyk'],
            'type' => $this->resource['typ'],
            'form' => $this->resource['forma']
        ];
    }
}