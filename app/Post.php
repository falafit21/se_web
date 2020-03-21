<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
//    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function requestDoctor(){
        return $this->belongsTo(User::class, 'request_ans_user_id');
    }

    public function Form(){
        return $this->hasOne(Form::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function petGene(){
        return $this->belongsTo(PetGene::class);
    }

    public function forms(){
        return $this->hasMany(Form::class);
    }
}
