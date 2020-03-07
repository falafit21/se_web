<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('admins.viewMember');
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

    public function show($id)
    {
        //
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
