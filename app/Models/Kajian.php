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

    //many to many with ustadz with attribute kafarah

    public function ustadz()
    {
        return $this->belongsToMany(Ustadz::class, "schedule_ustadzmasjid", "schedule_kajianmasjid_id", "ustadz_id")->withPivot("est_kafarah")->withPivot("accepted")->withTimestamps();
    }

    //has many with ScheduleUstadzMasjid
    public function scheduleUstadzMasjid()
    {
        return $this->hasMany(ScheduleUstadzMasjid::class, "schedule_kajianmasjid_id");
    }
}
