<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MasjidKajianResource extends JsonResource
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
            'title' => $this->kajian_title,
            'date' => $this->kajian_date,
            'masjid' => $this->masjid->name,
            'request'=> count($this->ustadz),
            'status' => $this->status_kajian,
          'ustadz' => UstadzResource::collection($this->ustadz),
          
            //'sylabus' =>$this->sylabus,

          
        ];
    }
}
