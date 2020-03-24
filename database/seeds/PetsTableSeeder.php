<?php

use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pet = new \App\Pet();
        $pet->name = "Bobo";
        $pet->user_id = 1;
        $pet->pet_type_id = 1;
        $pet->pet_gene_id = 1;
        $pet->weight = 25.2;
        $pet->birth_date = "1997-10-10";
        $pet->img = "public/imgs/dog1.jpg";
        $pet->save();
    }
}
