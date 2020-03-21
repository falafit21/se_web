<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function questionForm(){
        return $this->belongsTo(QuestionForm::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
