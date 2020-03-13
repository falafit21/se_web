<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
//    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Form(){
        return $this->hasOne(Form::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function petGene(){
        return $this->belongsTo(PetGene::class);
    }
}
