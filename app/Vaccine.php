<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    public function pet(){
        return $this->hasMany(Pet::class);
    }
    public function vaccine(){
        return $this->belongsTo(ReceivedVaccine::class);
    }
}
