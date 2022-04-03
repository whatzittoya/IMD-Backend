<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleUstadzResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'kajian_id' => $this->schedule_kajianmasjid_id,
          'note_for_masjid' => $this->note_for_masjid,
          'accepted' => $this->accepted,
          'kajian' => new KajianResource($this->kajian),
          
        ];
    }
}
