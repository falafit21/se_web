<?php

namespace App\Http\Controllers;

use App\RecievedVaccines;
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

    public function receivedVaccineDateStore(Request $request,  $pet_id){
//        $request->validate();
        $receivedVaccine = new RecievedVaccines;
        $receivedVaccine->pet_id = $pet_id;
        $receivedVaccine->vaccine_id = 3;
        $receivedVaccine->received_at = $request->input('receivedDate');
        $receivedVaccine->save();
        return redirect()->route('pet.show', ['pet' => $pet_id]);
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
        //
    }
}
