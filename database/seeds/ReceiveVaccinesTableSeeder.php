<?php

use Illuminate\Database\Seeder;
use App\ReceivedVaccine;
class ReceiveVaccinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $v = new \App\RecievedVaccines();
        $v->pet_id = 1;
        $v->vaccine_id = 1;
        $v->received_at = \Carbon\Carbon::create('2018', '10', '10');
        $v->save();

        $v1 = new \App\RecievedVaccines();
        $v1->pet_id = 1;
        $v1->vaccine_id = 2;
        $v1->received_at = \Carbon\Carbon::create('2018', '10', '10');
        $v1->save();

        $v2 = new \App\RecievedVaccines();
        $v2->pet_id = 2;
        $v2->vaccine_id = 7;
        $v2->received_at = \Carbon\Carbon::create('2019', '11', '22');
        $v2->save();

        $v3 = new \App\RecievedVaccines();
        $v3->pet_id = 7;
        $v3->vaccine_id = 8;
        $v3->received_at = \Carbon\Carbon::create('2015', '27', '10');
        $v3->save();
//
        $v4 = new \App\RecievedVaccines();
        $v4->pet_id = 3;
        $v4->vaccine_id = 6;
        $v4->received_at = \Carbon\Carbon::create('2018', '10', '10');
        $v4->save();
//
        $v5 = new \App\RecievedVaccines();
        $v5->pet_id = 4;
        $v5->vaccine_id = 9;
        $v5->received_at = \Carbon\Carbon::create('2018', '10', '10');
        $v5->save();
//
        $v6 = new \App\RecievedVaccines();
        $v6->pet_id = 5;
        $v6->vaccine_id = 7;
        $v6->received_at = \Carbon\Carbon::create('2018', '10', '10');
        $v6->save();$v1 = new \App\RecievedVaccines();
//
        $v7 = new \App\RecievedVaccines();
        $v7->pet_id = 8;
        $v7->vaccine_id = 8;
        $v7->received_at = \Carbon\Carbon::create('2018', '10', '10');
        $v7->save();
//
        $v8 = new \App\RecievedVaccines();
        $v8->pet_id = 6;
        $v8->vaccine_id = 11;
        $v8->received_at = \Carbon\Carbon::create('2018', '10', '10');
        $v8->save();
//
//        $v9 = new \App\RecievedVaccines();
//        $v9->pet_id = 1;
//        $v9->vaccine_id = 2;
//        $v9->received_at = \Carbon\Carbon::create('2018', '10', '10');
//        $v9->save();
//
//        $v10 = new \App\RecievedVaccines();
//        $v10->pet_id = 1;
//        $v10->vaccine_id = 2;
//        $v10->received_at = \Carbon\Carbon::create('2018', '10', '10');
//        $v10->save();



    }
}
