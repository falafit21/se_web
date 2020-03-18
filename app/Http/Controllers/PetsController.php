<?php

namespace App\Http\Controllers;

use App\Pet;
use App\PetGene;
use App\PetType;
use App\ReceivedVaccine;
use App\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        return view('pets.show');

    }

    public function create()
    {
        $genes = PetGene::all();
        $types = PetType::all();
        return view('pets.create', ['genes' => $genes , 'types' => $types]);
    }


    public function store(Request $request)
    {
        $type = $request->input('type');
        $gene = $request->input('gene');
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'gene' => ['required'],
            'birth-date-input' => ['required'],
            'weight' => ['required'],
        ]);

        $pet = new Pet;
        $pet->name = $request->input('name');
        $pet->user_id = Auth::id();
        $pet->pet_type_id = $type;
        $pet->pet_gene_id = $gene;
        $pet->weight = $request->input('weight');
        $pet->birth_date = $request->input('birth-date-input');
        $pet->save();

        return redirect()->route('user');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        $vaccines = Vaccine::all();

        return view('pets.show', [
            'vaccines' => $vaccines,
            'pet'=> $pet
        ]);
    }

    public function calculate(Request $request){
        $vaccines = Vaccine::all();
        $pets = Pet::all();

        $receivedVaccines = ReceivedVaccine::findOrFail();
        $receivedVaccines = $request->input('received_at');
        $receivedVaccines->received_at = Carbon::received_at()->addMonths($receivedVaccines->expired_at);
        $receivedVaccines->save();

        return redirect()->route('pets.calculate',[
                'receivedVaccined'=>$receivedVaccines,
                'vaccines'=>$vaccines,
                'pets'=>$pets
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pet = Pet::findOrFail($id);
        $genes = PetGene::all();
        $types = PetType::all();
        return view('pets.edit',[
            'pet'=>$pet,
            'genes'=> $genes,
            'types' => $types

        ]);

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
        $type = $request->input('type');
        $gene = $request->input('gene');
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'gene' => ['required'],
            'birth-date-input' => ['required'],
            'weight' => ['required'],
        ]);
        $pet = Pet::findOrFail();
        $pet->name = $request->input('name');
        $pet->user_id = Auth::id();
        $pet->pet_type_id = $type;
        $pet->pet_gene_id = $gene;
        $pet->weight = $request->input('weight');
        $pet->birth_date = $request->input('birth-date-input');
        $pet->save();

        return redirect()->route(['user','show']);


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
