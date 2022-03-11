<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SylabusResource;

class KajianResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $status_number=0;
        if ($this->status_kajian=="new") {
            $status_number=0;
        } elseif ($this->status_kajian=="has_ustadz") {
            $status_number=1;
        } elseif ($this->status_kajian=="rejected") {
            $status_number=2;
        }
        return [
            'id' => $this->id,
            'title' => $this->kajian_title,
            'date' => $this->kajian_date,
            'masjid' => $this->masjid->name,
            'masjid_id' => $this->masjid->id,
            'image' => $this->masjid->image,
            'status' => $status_number,
            'statusText' => $this->status_kajian,
            'sylabus' =>new SylabusResource($this->sylabus),
            //'sylabus' =>$this->sylabus,

          
        ];
    }
}
