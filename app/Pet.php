<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public function size(){
        return $this->belongsTo(PetSize::class);
    }

    public function gene(){
        return $this->belongsTo(PetGene ::class);
    }
}
