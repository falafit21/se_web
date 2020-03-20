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
    }
}
