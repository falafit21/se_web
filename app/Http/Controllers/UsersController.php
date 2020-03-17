<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Post;
use App\QuestionForm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DoctorInfo;

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
        return view('users.profile',
            ['user' => $user]
        );

    }

    public function getDocProfile()
    {
        $user = Auth::user();
        $doctor = DoctorInfo::find($user->doctor_info_id);
        // $posts = Post::findOrFail($user->id);
        return view('doctors.profile', [
                'user' => $user,
                'doctor' => $doctor
        ]);
    }

    public function create()
    {
        //
    }
    // create doc
    public function createDoc ()
    {
        $doctors = User::where('role', '=', 'doctor')->get();
        return view('doctors.create',
            ['doctors' => $doctors]
        );
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
