<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //doctors info
        $this->call(DoctorsInfoTableSeeder::class);

        //pet
        $this->call(PetTypesTableSeeder::class);
        $this->call(PetGenesTableSeeder::class);
        $this->call(WeightStatusesSeeder::class);

        //user
        $this->call(UsersTableSeeder::class);
        $this->call(PetsTableSeeder::class);
        //post
        $this->call(PostsTableSeeder::class);
        $this->call(CommentsSeeder::class);

        //form
        $this->call(QuestionFormsTableSeeder::class);
        $this->call(FormsTableSeeder::class);

        //vaccine
        $this->call(VaccinesTableSeeder::class);
        $this->call(ExampleVaccinesSeeder::class);
        $this->call(ReceiveVaccinesTableSeeder::class);
//        $this->call(ReceiveVaccinesTableSeeder::class);

        //pet tips
        $this->call(PetTipsTableSeeder::class);
    }
}
