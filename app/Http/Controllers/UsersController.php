<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        return view('admins.viewMember');
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

    public function show($id)
    {
        return view();
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
