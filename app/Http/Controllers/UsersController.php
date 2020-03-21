<?php

namespace App\Http\Controllers;

use App\Pet;
use App\PetGene;
use App\PetTip;
use App\PetType;
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
        $users = User::where('role', '=', 'user')->get();
        $user = Auth::user();
        return view('admins.viewMember', [
            'users' => $users,
            'user' => $user
        ]);

    }

    public function getUserProfile()
    {
        $user = Auth::user();
        $genes = PetGene::all();
        $types = PetType::all();
        return view('users.profile', [
            'user' => $user,
            'genes' => $genes,
            'types' => $types
        ]);

    }

    public function getDocProfile()
    {
        $user = Auth::user();
        $doctor = DoctorInfo::find($user->doctor_info_id);
        // $posts = Post::findOrFail($user->id);
        $posts = Post::all();
        return view('doctors.profile', [
            'user' => $user,
            'doctor' => $doctor,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        //
    }

    // create doc
    public function createDoc()
    {
        $doctors = User::where('role', '=', 'doctor')->get();
        $users = User::where('role', '=', 'user')->get();
        return view('doctors.create', [
            'doctors' => $doctors,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($users, $doctors)
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
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('users.profile', ['user' => $user]);
    }

    public function destroy($id)
    {
        //
    }
}
