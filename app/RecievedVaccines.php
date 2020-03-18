<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecievedVaccines extends Model
{
    public function vaccine(){
        return $this->belongsTo(Vaccine::class);
    }

}
