<?php

namespace App\Http\Controllers;

use App\DoctorInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorListsController extends Controller
{

    public function index()
    {
        $doctors = User::where('role', '=', 'doctor')->get();
        return view('doctors.doctorList', [
            'doctors' => $doctors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //        $request->validate();
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phoneNumber' => 'required',
            'graduatedFrom' => 'required',
            'workAt' => 'required',
            'licenseNumber' => 'required'
        ]);
        $docInfo = new DoctorInfo;
        $docInfo->phone_number = $request->input('phoneNumber');
        $docInfo->graduated = $request->input('graduatedFrom');
        $docInfo->work_at = $request->input('workAt');
        $docInfo->license_number = $request->input('licenseNumber');
        if ($docInfo->save()) {
            $recentDocInfo_id = $docInfo->latest()->first()->id;
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role = "doctor";
            $user->status = 1;
            $user->doctor_info_id = $recentDocInfo_id;
            $user->save();
        }
        return  redirect()->route('admin.createDoc');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
