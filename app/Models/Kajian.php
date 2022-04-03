<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Masjid;
use App\Models\Sylabus;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kajian extends Model
{
    use HasFactory, SoftDeletes,Blameable;
    protected $table = 'schedule_kajianmasjid';

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }

    //belongs to sylabus
    public function sylabus()
    {
        return $this->belongsTo(Sylabus::class, "sylabus_id");
    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class, "keilmuan");
    }


    //many to many with ustadz with attribute kafarah

    public function ustadz()
    {
        return $this->belongsToMany(Ustadz::class, "schedule_ustadzmasjid", "schedule_kajianmasjid_id", "ustadz_id")->withPivot("note_for_masjid")->withPivot("accepted")->withTimestamps();
    }

    //has many with ScheduleUstadzMasjid
    public function scheduleUstadzMasjid()
    {
        return $this->hasMany(ScheduleUstadzMasjid::class, "schedule_kajianmasjid_id");
    }

    //filter ustadz_id
    public function scopeUstadzId($ustadz_id)
    {
        return $this->ustadz()->where('ustadz_id', $ustadz_id);
    }
}
