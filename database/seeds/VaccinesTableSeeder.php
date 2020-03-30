<?php

use Illuminate\Database\Seeder;

class VaccinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         Dog
        $vaccine = new App\Vaccine();
        $vaccine->name = "DHPP";
        $vaccine->pet_type_id = 1;
        $vaccine->activate_range=36;
        $vaccine->prevent_symptom ="Against Canine distemper,Infectous Hepatitis,Parainfluenza and Parvovirus";
        $vaccine->save();

        $vaccine1 = new App\Vaccine();
        $vaccine1->name = "Rabied";
        $vaccine1->pet_type_id = 1;
        $vaccine1->activate_range=36;
        $vaccine1->prevent_symptom ="Add Immune system";
        $vaccine1->save();

        $vaccine2 = new App\Vaccine();
        $vaccine2->name = "Canine Distemper";
        $vaccine2->pet_type_id = 1;
        $vaccine2->activate_range = 12;
        $vaccine2->prevent_symptom ="Prevent virus that affects a dog’s respiratory, gastrointestinal,
         respiratory and central nervous systems, as well as the conjunctival membranes of the eye.";
        $vaccine2->save();

        $vaccine3 = new App\Vaccine();
        $vaccine3->name = "Leptospirosis";
        $vaccine3->pet_type_id = 1;
        $vaccine3->activate_range = 3;
        $vaccine3->prevent_symptom ="Prevent rodent infestation";
        $vaccine3->save();

        $vaccine4 = new App\Vaccine();
        $vaccine4->name = "Lyme Disease";
        $vaccine4->pet_type_id = 1;
        $vaccine4->activate_range = 12;
        $vaccine4->prevent_symptom ="Prevent lyme disease";
        $vaccine4->save();

//        cat
        $vaccine5 = new App\Vaccine();
        $vaccine5->name = "Rabies";
        $vaccine5->pet_type_id = 2;
        $vaccine5->activate_range = 2;
        $vaccine5->prevent_symptom =" infected by a bite from any infected mammal and then pass it on to others.";
        $vaccine5->save();

        $vaccine6 = new App\Vaccine();
        $vaccine6->name = "FVRCP";
        $vaccine6->pet_type_id = 2;
        $vaccine6->activate_range = 4;
        $vaccine6->prevent_symptom ="efficiently administer the vaccines all at once.";
        $vaccine6->save();

        $vaccine7 = new App\Vaccine();
        $vaccine7->name = "FPV";
        $vaccine7->pet_type_id = 2;
        $vaccine7->activate_range = 12;
        $vaccine7->prevent_symptom ="Prevent Feline panleukopenia.";
        $vaccine7->save();

        $vaccine8 = new App\Vaccine();
        $vaccine8->name = "FCV";
        $vaccine8->pet_type_id = 2;
        $vaccine8->activate_range = 12;
        $vaccine8->prevent_symptom ="Prevent hepatitis.";
        $vaccine8->save();

        $vaccine9 = new App\Vaccine();
        $vaccine9->name = "FHV-1";
        $vaccine9->pet_type_id = 2;
        $vaccine9->activate_range = 12;
        $vaccine9->prevent_symptom ="Prevent feline rhinotracheitis virus.";
        $vaccine9->save();

//        Rabbit
        $vaccine10 = new App\Vaccine();
        $vaccine10->name = "RHD";
        $vaccine10->pet_type_id = 3;
        $vaccine10->activate_range = 12;
        $vaccine10->prevent_symptom ="Prevent RHD-1 and RHD-2 and rabbits need to be vaccinated against both.";
        $vaccine10->save();







    }
}
