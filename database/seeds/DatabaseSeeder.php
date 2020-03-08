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


        //pet
        $this->call(PetSizesTableSeeder::class);
        $this->call(PetTypesTableSeeder::class);
        $this->call(PetsTableSeeder::class);

        //user
        $this->call(UsersTableSeeder::class);

        //post
        $this->call(PostsTableSeeder::class);

        //form
        $this->call(QuestionFormsTableSeeder::class);
        $this->call(FormsTableSeeder::class);
    }
}
