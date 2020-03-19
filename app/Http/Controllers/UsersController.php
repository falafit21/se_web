<?php

namespace App\Http\Controllers;

use App\Pet;
use App\PetTip;
use App\Post;
use App\QuestionForm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DoctorInfo;

class UsersController extends Controller

{
    public function __construct(){
        $this->middleware('auth');
    }
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
    public function createDoc()
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
        return redirect()->route('users.profile',['user'=>$user]);
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->->with("success","Password changed successfully !");

    }

    public function updatePassword(Request $request, $id){
        //
    }

    public function destroy($id)
    {
        //
    }
}
