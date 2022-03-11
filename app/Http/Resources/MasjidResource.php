<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MasjidResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //resource masjid
        return [
            'id' => $this->id,
            'name' => $this->name,
            'alamat' => $this->alamat,
            'kabupaten' => $this->kabupaten,
            'kecamatan' => $this->kecamatan,
            'email' => $this->email,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
