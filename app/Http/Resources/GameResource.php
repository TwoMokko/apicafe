<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'name'                  => $this->name,
            'description'           => $this->description,
            'photo'                 => $this->photo,
            'people_count_min'      => $this->people_count_min,
            'people_count_max'      => $this->people_count_max,
            'time_count_min'        => $this->time_count_min,
            'time_count_max'        => $this->time_count_max,
            'age'                   => $this->age,
            'rules'                 => $this->rules,
            'is_published'          => $this->is_published,
            'created_at'            => $this->created_at,
        ];
    }
}
