<?php

use Illuminate\Database\Seeder;

class PetTipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pet_tip1 = new \App\PetTip();
        $pet_tip1->title = "ALWAYS KEEP FRESH WATER AVAILABLE. ";
        $pet_tip1->detail = "Maintaining optimal hydration is important for health and energy.";
        $pet_tip1->save();

        $pet_tip2 = new \App\PetTip();
        $pet_tip2->title = "PROVIDE A PROTECTED AND CLEAN LIVING ENVIRONMENT FOR YOUR DOG.";
        $pet_tip2->detail = "Shelter from the elements and hazards, as well as good hygiene, are basic to a quality life.";
        $pet_tip2->save();

        $pet_tip3 = new \App\PetTip();
        $pet_tip3->title = "";
        $pet_tip3->detail = "";
        $pet_tip3->img_path = "public/tips/banner.png";
        $pet_tip3->save();
    }
}
