<?php

namespace App\Http\Controllers;

use App\RecievedVaccines;
use App\Vaccine;
use Illuminate\Http\Request;

class VaccinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
//        $request->validate([
//            'vaccineFor' => ['required'],
//            'vaccineName' => ['required'],
//            'activateRange' => ['required'],
//            'PreventSymptom' => ['required'],
//        ]);
//        $vaccine = new Vaccine;
//        $vaccine->pet_type_id = $request->input('vaccineFor');
//        $vaccine->name = $request->input('vaccineName');
//        $vaccine->activate_range = $request->input('activateRange');
//        $vaccine->prevent_symptom = $request->input('PreventSymptom');
//        $vaccine->save();
//        return redirect()->route('pet.show', ['pet' => 2]);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function vaccineDestroy($recieve_vaccine_id, $pet_id)
    {

        $recieved_vaccine = RecievedVaccines::find($recieve_vaccine_id);
        $recieved_vaccine->delete();
        $vaccine = Vaccine::find($recieve_vaccine_id);
        $vaccine->delete();
        return redirect()->route('pet.show', ['pet' => $pet_id]);

    }
}
