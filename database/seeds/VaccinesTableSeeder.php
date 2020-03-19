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
        // Dog
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


    }
}
