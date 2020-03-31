<?php

namespace App\Http\Controllers;

use App\ExampleVaccine;
use App\Pet;
use App\PetGene;
use App\PetType;
use App\RecievedVaccines;
use App\Vaccine;
use App\WeightHistory;
use App\WeightStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;

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
            'vaccineName' => ['required'],
            'activateRange' => ['required'],
            'PreventSymptom' => ['required'],
            'receivedDate' => ['required']
        ]);
        $pet_type_id = Pet::find($pet_id)->pet_type_id;

        $vaccine = new Vaccine;
        $vaccine->pet_type_id = $pet_type_id;
        $vaccine->name = $request->input('vaccineName');
        $vaccine->activate_range = $request->input('activateRange');
        $vaccine->prevent_symptom = $request->input('PreventSymptom');
        if($vaccine->save()){
            $recentVaccine_id = $vaccine->latest()->first()->id;

            $recieved_vaccine = new RecievedVaccines;
            $recieved_vaccine->pet_id = $pet_id;
            $recieved_vaccine->vaccine_id = $recentVaccine_id;
            $recieved_vaccine->received_at = $request->input('receivedDate');
            $recieved_vaccine->save();
        }
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
            'img' => ['required']
        ]);

        $pet = new Pet;
        $pet->name = $request->input('name');
        $pet->user_id = Auth::id();
        $pet->pet_type_id = $request->input('type');
        $pet->pet_gene_id = $request->input('gene');
        $pet->weight = $request->input('weight');
        $pet->birth_date = $request->input('birth-date-input');
        $pet->img = $request->file('img')->store('public/imgs');
        $pet-_save();

//        if($pet->save()){
//            $recentPet_id = $pet->latest()->first()->id;
//
//            $weight_history = new WeightHistory;
//            $weight_history->weight = $request->input('weight');
//            $weight_history->pet_id = $recentPet_id;
//            $weight_history->save();
//        }
        return redirect()->route('users.profile');
    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        $currentType = Pet::find($id)->petType->id;
        $currentGene = Pet::find($id)->pet_gene_id;
        $vaccineInCurrentType = ExampleVaccine::where('pet_type_id', '=' , $currentType)->get();
        $types = PetType::all();
        $recieve_vaccines = RecievedVaccines::where('pet_id', '=' , $id)->get();
        $current_weight_statuses = WeightStatuses::where('pet_gene_id', '=', $currentGene)->get();
        $weight_Histories = WeightHistory::where("pet_id", "=", $id)->get();

        return view('pets.show', [
            'vaccinesInCurrentType' => $vaccineInCurrentType,
            'pet'=> $pet,
            'types' => $types,
            'recieve_vaccines' => $recieve_vaccines,
            'weight_status' => $current_weight_statuses,
            'weight_Histories' => $weight_Histories
        ]);
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);
        $request->validate([
            'weight' => ['required'],
            'birth-date-input' => ['required']
        ]);
        $pet->weight = $request->input('weight');
        $pet->birth_date = $request->input('birth-date-input');
        // $pet->img = $request->file('img')->store('public/imgs');
        $pet->save();

        $weightHistory = new WeightHistory;
        $weightHistory->weight = $request->input('weight');
        $weightHistory->pet_id = $id;
        $weightHistory->save();

        return redirect()->route('pet.show',['pet'=>$pet]);
    }

    public function vaccineUpdate(Request $request, $pet_id){
        $vaccine_id = $request->input('vaccineId');

        $vaccine = Vaccine::findOrFail($vaccine_id);

        $all_received_vaccine = RecievedVaccines::where('vaccine_id', "=", $vaccine_id)->get();
        $received_vaccine_id = $all_received_vaccine[0]->id;
        $received_vaccine = RecievedVaccines::find($received_vaccine_id);

        $request->validate([
            'vaccineName' => ['required'],
            'activateRange' => ['required'],
            'receivedDate' => ['required']
        ]);

        $vaccine->name = $request->input('vaccineName');
        $received_vaccine->received_at = $request->input('receivedDate');
        $vaccine->activate_range = $request->input('activateRange');
        $vaccine->save();
        $received_vaccine->save();

        return redirect()->route('pet.show', ['pet' => $pet_id]);
    }

    public function destroy($id)
    {
        //
    }

}
