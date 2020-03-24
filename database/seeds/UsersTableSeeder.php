<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = new \App\User();
        $user->name = "Fish shukishi";
        $user->email = "fish@shukishi.com";
        $user->password = Hash::make('fish1234');
        $user->status = 1;
//        $user->role = "user";
        $user->save();

        $user1 = new \App\User();
        $user1->name = "DR. Bell shukishi";
        $user1->email = "Bell@shukishi.com";
        $user1->password = Hash::make('bell1234');
        $user1->status = 1;
        $user1->role = "doctor";
        $user1->doctor_info_id = 1;
        $user1->save();

        $user2 = new \App\User();
        $user2->name = "Zen Admin";
        $user2->email = "Zen@shukishi.com";
        $user2->password = Hash::make('zen1234');
        $user2->status = 1;
        $user2->role = "admin";
        $user2->save();

        $user3 = new \App\User();
        $user3->name = "Fish1 shukishi";
        $user3->email = "Fish1@shukishi.com";
        $user3->password = Hash::make('fish11234');
        $user3->status = 1;
//        $user3->role = "user";
        $user3->save();

        $user4 = new \App\User();
        $user4->name = "DR.Jing shukishi";
        $user4->email = "Jing@shukishi.com";
        $user4->password = Hash::make('Jing234');
        $user4->status = 1;
        $user4->role = "doctor";
        $user4->doctor_info_id = 2;
        $user4->save();

        $user5 = new \App\User();
        $user5->name = "Dr.Mook shukishi";
        $user5->email = "Mook@shukishi.com";
        $user5->password = Hash::make('Jing234');
        $user5->status = 1;
        $user5->role = "doctor";
        $user5->doctor_info_id = 3;
        $user5->save();


    }
}
