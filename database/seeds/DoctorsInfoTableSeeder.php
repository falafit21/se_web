<?php

use Illuminate\Database\Seeder;

class DoctorsInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = new \App\DoctorInfo();
        $doctor->phone_number = '0890766450';
        $doctor->graduated = 'Kasetsart University';
        $doctor->work_at = 'Paolo';
        $doctor->license_number='1234567890';
        $doctor->save();
    }
}
