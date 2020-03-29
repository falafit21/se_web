<?php

namespace App\Http\Controllers;

use App\Comment;
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
use Illuminate\Support\Facades\Hash;

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

// doctor
    public function updateProfile(Request $request, $id){
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'work_at' => 'required'
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $doctor = DoctorInfo::find($user->doctor_info_id);
        $doctor->phone_number = $request->input('phone_number');
        $doctor->work_at = $request->input('work_at');
        $doctor->save();
        return redirect()->back();

    }

    public function getDocProfile()
    {
        $user = Auth::user();
        $doctor = DoctorInfo::find($user->doctor_info_id);
         $posts = Post::all();
        $requestQuestion = Post::where('doc_already_ans', '=', null)->get();
        $answeredPost = Post::where('doc_already_ans', '=', 1)->get();

        return view('doctors.profile', [
            'user' => $user,
            'doctor' => $doctor,
            'requestQuestion' => $requestQuestion,
            'answeredPost' => $answeredPost
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
        $user = Auth::user();
        return view('doctors.create', [
            'doctors' => $doctors,
            'users' => $users,
            'user' => $user
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
        $user =  User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->back();
    }

    public function updateStatus(Request $request){
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }

//    public function showChangePasswordForm(){
//        return view('changepassword');
//    }
    public function __construct()
    {
        $this->middleware('auth');
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

        return redirect()->back()->with("success","Password changed successfully !");

    }
    public function imageUpload()
    {
        return view('load');
    }
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('imgs'), $imageName);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);

    }

    public function destroy($id)
    {
        //
    }

}
