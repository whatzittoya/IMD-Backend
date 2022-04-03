<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SylabusResource;
use Carbon\Carbon;

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
        //convert kajian_date to date format carbon
        Carbon::setLocale('id');

        $date = Carbon::parse($this->kajian_date);
        $date_finish =$this->kajian_date_finish ? Carbon::parse($this->kajian_date_finish)->format('d-m-Y'):null;

        $status_number=0;
        $invitation=$this->jenis_undangan;
        $tipe_kajian=$this->tipe_kajian;
        $event=$this->event;
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
            'tipe_kajian' => $this->tipe_kajian ?? '',
            'event' => $this->event ?? '',
            'date' => $date->translatedFormat('d F Y'),
            'second_date' => $date_finish,
            'day'=>$date->dayName,
            'time'=>$this->waktu,
            'masjid' => $this->masjid->name,
            'masjid_id' => $this->masjid->id,
            'image' => $this->masjid->image,
            'status' => $status_number,
            'statusText' => $this->status_kajian,
            'sylabus' =>new SylabusResource($this->sylabus) ?? '',
            'speciality' =>new SpecialityResource($this->speciality) ?? '' ,
            'ustadz' => UstadzResource::collection($this->ustadz),
            'masjid_obj'=>new MasjidResource($this->masjid),
'invitation'=>$invitation,
'note'=>$this->note,
            //'sylabus' =>$this->sylabus,

          
        ];
    }
}
