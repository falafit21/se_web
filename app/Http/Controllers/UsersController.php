<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Post;
use App\QuestionForm;
use App\User;
use Illuminate\Http\Request;

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
        return view('users.profile');
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
        return view('admins.viewMember', [
            'doctors' => $doctors,
            'users' => $users,

        ]);
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
