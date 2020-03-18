<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetTip extends Model
{
    public function tips(){
        return $this->belongsTo(User::class);
    }
}
