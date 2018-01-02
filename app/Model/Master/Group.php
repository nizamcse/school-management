<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];

    public function setNameAttribute($value) {
        $this->attributes['name'] = strtoupper($value);
    }
}
