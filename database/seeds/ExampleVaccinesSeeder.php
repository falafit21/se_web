<?php

use Illuminate\Database\Seeder;

class ExampleVaccinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaccine = new App\ExampleVaccine();
        $vaccine->name = "DHPP";
        $vaccine->pet_type_id = 1;
//        $vaccine->activate_range=36;
//        $vaccine->prevent_symptom ="Against Canine distemper,Infectous Hepatitis,Parainfluenza and Parvovirus";
        $vaccine->save();

        $vaccine1 = new App\ExampleVaccine();
        $vaccine1->name = "Rabied";
        $vaccine1->pet_type_id = 1;
//        $vaccine1->activate_range=36;
//        $vaccine1->prevent_symptom ="Add Immune system";
        $vaccine1->save();

        $vaccine2 = new App\ExampleVaccine();
        $vaccine2->name = "Leptospirosis";
        $vaccine2->pet_type_id = 1;
//        $vaccine2->activate_range=12;
//        $vaccine2->prevent_symptom ="y prevent leptospirosis ";
        $vaccine2->save();

        $vaccine3 = new App\ExampleVaccine();
        $vaccine3->name = "Canine Influenza";;
        $vaccine3->pet_type_id = 1;
//        $vaccine3->activate_range=12;
//        $vaccine3->prevent_symptom ="prevention from dog flu";
        $vaccine3->save();

        $vaccine4 = new App\ExampleVaccine();
        $vaccine4->name = "Lyme Disease";
        $vaccine4->pet_type_id = 1;
//        $vaccine4->activate_range=12;
//        $vaccine4->prevent_symptom ="Prevention from Lyme Disease";
        $vaccine4->save();

        $vaccine5 = new App\ExampleVaccine();
        $vaccine5->name = "Bordetella (Kennel Cough)";
        $vaccine5->pet_type_id = 1;
//        $vaccine5->activate_range="6";
//        $vaccine5->prevent_symptom ="Prevention from Bordetella";
        $vaccine5->save();

        //cat

        $vaccine6 = new App\ExampleVaccine();
        $vaccine6->name ="Rabies";
        $vaccine6->pet_type_id = 2;
//        $vaccine6->activate_range=12;
//        $vaccine6->prevent_symptom ="Add immune system";
        $vaccine6->save();

        $vaccine7 = new App\ExampleVaccine();
        $vaccine7->name ="Feline Combo";
        $vaccine7->pet_type_id = 2;
//        $vaccine7->activate_range=36;
//        $vaccine7->prevent_symptom ="Prevention from feline";
        $vaccine7->save();

        $vaccine8 = new App\ExampleVaccine();
        $vaccine8->name ="FeLV";
        $vaccine8->pet_type_id = 2;
//        $vaccine8->activate_range=12;
//        $vaccine8->prevent_symptom ="Prevention from anemia in cat. ";
        $vaccine8->save();

        $vaccine9 = new App\ExampleVaccine();
        $vaccine9->name ="Bordetella";
        $vaccine9->pet_type_id = 2;
//        $vaccine9->activate_range=12;
//        $vaccine9->prevent_symptom ="prevention of disease caused by Bordetella bronchiseptica. ";
        $vaccine9->save();
    }
}
