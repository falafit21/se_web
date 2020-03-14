<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public function size(){
        return $this->belongsTo(PetSize::class);
    }

    public function petGene(){
        return $this->belongsTo(PetGene ::class);
    }

    public function petType(){
        return $this->belongsTo(PetType::class);
    }
}
