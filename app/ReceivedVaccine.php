<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivedVaccine extends Model
{
    public function vaccine(){
        return $this->hasMany(Vaccine::class);
    }
}
