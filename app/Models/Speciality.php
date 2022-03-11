<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    protected $table = 'speciality';

    //hasmany sylabus
    public function sylabus()
    {
        return [
            'id' => $this->id,
            'name' => $this->speciality,
        ];
    }
}
