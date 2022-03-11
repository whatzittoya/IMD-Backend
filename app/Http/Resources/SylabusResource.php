<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SpecialityResource;

class SylabusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    protected $foo;
    public function toArray($request, $except=null)
    {
        return [
            'id' => $this->id,
            'name' => $this->sylabus_name,
            'speciality_id' => $this->speciality_id,
            'speciality' => new SpecialityResource($this->whenLoaded('speciality')),
        ];
    }
}
