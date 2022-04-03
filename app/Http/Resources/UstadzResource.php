<?php

namespace App\Http\Resources;

use App\Models\ScheduleUstadzMasjid;
use Illuminate\Http\Resources\Json\JsonResource;

class UstadzResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'schedule' => $this->pivot,
            'address' => $this->address,
            'hp' => $this->hp,
            'email' => $this->email,
        
            'speciality' =>$this->speciality,
        ];
    }
}
