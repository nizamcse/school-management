<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name'];

    public function policeStation(){
        return $this->belongsTo('App\Model\Master\PoliceStation','district_id','id');
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = strtoupper($value);
    }
}
