<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ustadz extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'ustadz';

   
    public function getImageAttribute($value)
    {
        return $value?asset('img/'.$value):asset('img/ustadz.jpg');
    }
    //many to many with kajian
    public function kajian()
    {
        return $this->belongsToMany(Kajian::class, "schedule_ustadzmasjid", "ustadz_id", "schedule_kajianmasjid_id")->withPivot("est_kafarah")->withTimestamps();
    }

    //many to many with speciality
    public function speciality()
    {
        return $this->belongsToMany(Speciality::class, "ustadz_speciality", "ustadz_id", "speciality_id");
    }

    //has userid
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
