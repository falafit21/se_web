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

    public function vaccine(){
        return $this->belongsTo(Vaccine::class);
    }

    public function recievedVaccines(){
        return $this->hasMany(RecievedVaccines::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function weightHistories(){
        return $this->hasMany(WeightHistory::class);
    }
}
