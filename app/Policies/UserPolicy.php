<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewOnlyUserAndDoctor(User $user)
    {
        return $user->role !== "admin";
    }

    public function viewOnlyUser(User $user)
    {
        return $user->role === "user";
    }

    public function viewAny(User $user)
    {
        return $user->role === "admin";
    }

    public function viewOnlyMe(User $user){
        return $user->id = Auth::user()->id;
    }

    public function view(User $user, User $model)
    {
        return $user->role === "admin" ||
            $user->role === "user" ||
            $user->id === $model->id ||
            $user->role === "doctor";
    }

    public function createTip(User $user)
    {
        return $user->role === 'admin' ||
            $user->role === 'doctor';
    }

    public function createDoctor(User $user)
    {
        return $user->role === "admin";
    }

    public function profileDoctor(User $user)
    {
        return $user->role === "doctor";
    }

    public function profileUser(User $user)
    {
        return $user->role === "user";
    }

    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function delete(User $user, User $model)
    {
        return $user->role === 'admin' ||
            $user->id === $model->id;
    }

    public function restore(User $user, User $model)
    {
        //
    }

    public function forceDelete(User $user, User $model)
    {
        //
    }
}
