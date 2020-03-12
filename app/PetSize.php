<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetSize extends Model
{
    public function pets(){
        return $this->hasMany(Pet::class);
    }
}
