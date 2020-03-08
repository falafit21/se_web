<?php

use Illuminate\Database\Seeder;

class PetTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new \App\PetType();
        $type->type = "dog";
        $type->save();

        $type1 = new \App\PetType();
        $type1->type = "cat";
        $type1->save();

        $type2 = new \App\PetType();
        $type2->type = "rabbit";
        $type2->save();
    }
}
