<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable=['name'];

    public function setNameAttribute($value) {
        $this->attributes['name'] = strtoupper($value);
    }
}
