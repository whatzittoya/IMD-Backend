<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sylabus extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'speciality_sylabus';

    //belongs to speciality
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
