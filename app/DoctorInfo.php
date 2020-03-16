<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorInfo extends Model
{
    protected $table = 'doctors_info';
    public function user(){
        return $this->hasOne(User::class);
    }
}
