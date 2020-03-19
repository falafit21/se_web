<?php

namespace App\Http\Controllers;

use App\ExampleVaccine;
use App\Pet;
use App\PetGene;
use App\PetType;
use App\RecievedVaccines;
use App\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PetsController extends Controller
{

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

    public function vaccineStore(Request $request, $pet_id){
        $request->validate([
            'vaccineFor' => ['required'],
            'vaccineName' => ['required'],
            'activateRange' => ['required'],
            'PreventSymptom' => ['required'],
        ]);
        $vaccine = new Vaccine;
        $vaccine->pet_type_id = $request->input('vaccineFor');
        $vaccine->name = $request->input('vaccineName');
        $vaccine->activate_range = $request->input('activateRange');
        $vaccine->prevent_symptom = $request->input('PreventSymptom');
        $vaccine->save();
        return redirect()->route('pet.show', ['pet' => $pet_id]);
    }

    public function store(Request $request)
    {
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
        $pet->pet_type_id = $request->input('type');
        $pet->pet_gene_id = $request->input('gene');
        $pet->weight = $request->input('weight');
        $pet->birth_date = $request->input('birth-date-input');
        $pet->save();

        return redirect()->route('users.profile');
    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        $currentType = Pet::find($id)->petType->id;
        $vaccineInCurrentType = ExampleVaccine::where('pet_type_id', '=' , $currentType)->get();
        $types = PetType::all();
        $recieve_vaccines = RecievedVaccines::where('pet_id', '=' , $id)->get();
        return view('pets.show', [
            'vaccinesInCurrentType' => $vaccineInCurrentType,
            'pet'=> $pet,
            'types' => $types,
            'recieve_vaccines' => $recieve_vaccines
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $type = $request->input('type');
        $gene = $request->input('gene');
//        $request->validate([
//            'name' => ['required'],
//            'type' => ['required'],
//            'gene' => ['required'],
//            'birth-date-input' => ['required'],
//            'weight' => ['required'],
//        ]);
        $pet = Pet::findOrFail($id);
        $pet->name = $request->input('name');
        $pet->user_id = Auth::id();
        $pet->pet_type_id = $type;
        $pet->pet_gene_id = $gene;
        $pet->weight = $request->input('weight');
        $pet->birth_date = $request->input('birth-date-input');
        $pet->save();

        return redirect()->route('pet.show',['pet'=>$pet]);


    }

    public function destroy($id)
    {
        //
    }
}
