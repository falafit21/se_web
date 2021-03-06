<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetType extends Model
{
    public function pets(){
        return $this->hasMany(Pet::class);
    }

    public function vaccines(){
        return $this->hasMany(Vaccine::class,'pet_type_id');
    }
}
