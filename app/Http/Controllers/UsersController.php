<?php

namespace App\Http\Controllers;

use App\Pet;
<<<<<<< HEAD
=======
use App\Post;
use App\QuestionForm;
use App\User;
>>>>>>> 1b64d3a21fb6da1efc0cf599a32fc7c0ab3c65db
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {


        $doctors = User::where('role', '=', 'doctor')->get();
        $users = User::where('role', '=', 'user')->get();


        return view('admins.viewMember', [
            'doctors' => $doctors,
            'users' => $users,

        ]);

    }

    public function getUserProfile(){
        $user = Auth::user();
        return view('users.profile',['user'=>$user]);
    }

    public function getDocProfile()
    {
        return view('doctors.profile');
    }

    public function create()
    {
        //
    }
    // create doc
    public function createDoc ()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($users,$doctors)
    {
<<<<<<< HEAD
        return view();
=======
        return view('admins.viewMember', [
            'doctors' => $doctors,
            'users' => $users,

        ]);
>>>>>>> 1b64d3a21fb6da1efc0cf599a32fc7c0ab3c65db
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
