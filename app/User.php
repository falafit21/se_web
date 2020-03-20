<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Post::class, 'user_id');
    }

    public function postsRequest(){
        return $this->hasMany(Post::class,'request_ans_user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function pets(){
        return $this->hasMany(Pet::class);
    }

    public function doctorInfo(){
        return $this->belongsTo(DoctorInfo::class);
    }




}
