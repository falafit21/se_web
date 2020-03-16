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
        $vaccine = new App\Vaccine();
        $vaccine->name = "DHPP";
        $vaccine->prevent_symptom ="";
        $vaccine->activate_range="36";
        $vaccine->save();

        $vaccine1 = new App\Vaccine();
        $vaccine1->name = "Rabied";
        $vaccine1->prevent_symptom ="";
        $vaccine1->activate_range="36";
        $vaccine1->save();

        $vaccine2 = new App\Vaccine();
        $vaccine2->name = "Leptospirosis";
        $vaccine2->prevent_symptom ="";
        $vaccine2->activate_range="12";
        $vaccine2->save();

        $vaccine2 = new App\Vaccine();
        $vaccine2->name = "Canine Influenza";;
        $vaccine2->prevent_symptom ="";
        $vaccine2->activate_range="12";
        $vaccine2->save();

        $vaccine3 = new App\Vaccine();
        $vaccine3->name = "Lyme Disease";
        $vaccine3->prevent_symptom ="";
        $vaccine3->activate_range="12";
        $vaccine3->save();

        $vaccine4 = new App\Vaccine();
        $vaccine4->name = "Bordetella (Kennel Cough)";
        $vaccine4->prevent_symptom ="";
        $vaccine4->activate_range="6";
        $vaccine4->save();
    }
}
