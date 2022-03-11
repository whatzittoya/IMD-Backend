<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masjid extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'masjid';

    // protected function img(): Attribute
    // {
    //     //return get and set attribute

    //     return new Attribute(
    //         get: fn ($value) =>$value?$value:asset('img/masjid.png')
    //     );
    // }

    public function getImageAttribute($value)
    {
        return $value?$value:asset('img/masjid.png');
    }

    //has many kajian
    public function kajian()
    {
        return $this->hasMany(Kajian::class);
    }
}
