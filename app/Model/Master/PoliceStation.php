<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class PoliceStation extends Model
{
    protected $fillable = [
        'name',
        'district_id',
    ];

    public function district(){
        return $this->belongsTo('App\Model\Master\District','district_id','id');
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = strtoupper($value);
    }
}
