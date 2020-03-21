<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionForm extends Model
{
    public function forms(){
        return $this->hasMany(Form::class);
    }

}
