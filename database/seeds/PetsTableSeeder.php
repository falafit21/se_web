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

        $pet1 = new \App\Pet();
        $pet1->name = "Dambo";
        $pet1->user_id = 7;
        $pet1->pet_type_id = 1;
        $pet1->pet_gene_id = 1;
        $pet1->weight = 7;
        $pet1->birth_date = "1997-10-10";
        $pet1->img = "public/imgs/dog2.jpg";
        $pet1->save();
//
//        $pet2 = new \App\Pet();
//        $pet2->name = "Sugar";
//        $pet2->user_id = 4;
//        $pet2->pet_type_id = 2;
//        $pet2->pet_gene_id = 18;
//        $pet2->weight = 8.4;
//        $pet2->birth_date = "1997-11-22";
//        $pet2->img = "public/imgs/cat.jpg";
//        $pet2->save();

        $pet3 = new \App\Pet();
        $pet3->name = "Pingping";
        $pet3->user_id = 10;
        $pet3->pet_type_id = 2;
        $pet3->pet_gene_id = 20;
        $pet3->weight = 5.6;
        $pet3->birth_date = "1997-05-12";
        $pet3->img = "public/imgs/cat1.jpeg";
        $pet3->save();

        $pet4 = new \App\Pet();
        $pet4->name = "Oscar";
        $pet4->user_id = 11;
        $pet4->pet_type_id = 2;
        $pet4->pet_gene_id = 22;
        $pet4->weight = 10.2;
        $pet4->birth_date = "1997-07-08";
        $pet4->img = "public/imgs/cat2.jpeg";
        $pet4->save();

        $pet5 = new \App\Pet();
        $pet5->name = "Ginger";
        $pet5->user_id = 1;
        $pet5->pet_type_id = 3;
        $pet5->pet_gene_id = 34;
        $pet5->weight = 4.6;
        $pet5->birth_date = "2012-02-08";
        $pet5->img = "public/imgs/rabbit.jpg";
        $pet5->save();

        $pet6 = new \App\Pet();
        $pet6->name = "Cookie";
        $pet6->user_id = 12;
        $pet6->pet_type_id = 1;
        $pet6->pet_gene_id = 10;
        $pet6->weight = 11.4;
        $pet6->birth_date = "2009-12-29";
        $pet6->img = "public/imgs/dog3.jpg";
        $pet6->save();

        $pet7 = new \App\Pet();
        $pet7->name = "Pepper";
        $pet7->user_id = 13;
        $pet7->pet_type_id = 2;
        $pet7->pet_gene_id = 23;
        $pet7->weight = 7.8;
        $pet7->birth_date = "2011-09-08";
        $pet7->img = "public/imgs/cat3.jpg";
        $pet7->save();


    }
}
