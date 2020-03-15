<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorInfo extends Model
{
    protected $table = 'doctors_info';
    public function getUser(){
        return $this->hasMany(User::class);
    }
}
