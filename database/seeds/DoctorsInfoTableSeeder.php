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

        $doctor1 = new \App\DoctorInfo();
        $doctor1->phone_number = '0890766450';
        $doctor1->graduated = 'Thammasat University';
        $doctor1->work_at = 'Thonglor Pet Hospital';
        $doctor1->license_number='12387283';
        $doctor1->save();

        $doctor2 = new \App\DoctorInfo();
        $doctor2->phone_number = '0890766450';
        $doctor2->graduated = 'Chulalongkorn University';
        $doctor2->work_at = 'Vet Pet Hospital';
        $doctor2->license_number='1637823';
        $doctor2->save();
    }
}
