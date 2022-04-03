<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleUstadzMasjid extends Model
{
    use HasFactory;
    protected $table = 'schedule_ustadzmasjid';

    //belongs to kajian
    public function kajian()
    {
        return $this->belongsTo('App\Models\Kajian', 'schedule_kajianmasjid_id');
    }
}
