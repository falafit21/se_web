<?php

use Illuminate\Database\Seeder;

class PetSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = new \App\PetSize();
        $size->size = "big";
        $size->save();

        $size1 = new \App\PetSize();
        $size1->size = "medium";
        $size1->save();

        $size2 = new \App\PetSize();
        $size2->size = "tiny";
        $size2->save();
    }
}
