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
        $user1->img_path = "public/doctors/doc1.jpg";
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
        $user4->password = Hash::make('jing1234');
        $user4->status = 1;
        $user4->role = "doctor";
        $user4->img_path = "public/doctors/doc2.jpg";
        $user4->doctor_info_id = 2;
        $user4->save();

        $user5 = new \App\User();
        $user5->name = "Dr.Mook shukishi";
        $user5->email = "Mook@shukishi.com";
        $user5->password = Hash::make('mook1234');
        $user5->status = 1;
        $user5->role = "doctor";
        $user5->img_path = "public/doctors/doc3.jpg";
        $user5->doctor_info_id = 3;
        $user5->save();

        $user6 = new \App\User();
        $user6->name = "earth shukishi";
        $user6->email = "earth@shukishi.com";
        $user6->password = Hash::make('earth1234');
        $user6->status = 1;
//        $user3->role = "user";
        $user6->save();



        $user7 = new \App\User();
        $user7->name = "Dr.Nathan Ureaka";
        $user7->email = "Nathan@shukishi.com";
        $user7->password = Hash::make('nathan1234');
        $user7->status = 1;
        $user7->role = "doctor";
        $user7->img_path = "public/doctors/doc4.jpg";
        $user7->doctor_info_id = 4;
        $user7->save();


        $user8 = new \App\User();
        $user8->name = "Dr.Viva Titee";
        $user8->email = "Viva@shukishi.com";
        $user8->password = Hash::make('viva1234');
        $user8->status = 1;
        $user8->role = "doctor";
        $user8->img_path = "public/doctors/doc5.jpg";
        $user8->doctor_info_id = 5;
        $user8->save();


        $user9 = new \App\User();
        $user9->name = "Pizza shukishi";
        $user9->email = "pizza@shukishi.com";
        $user9->password = Hash::make('pizza1234');
        $user9->status = 1;
//        $user->role = "user";
        $user9->save();

        $user10 = new \App\User();
        $user10->name = "Arbenz shukishi";
        $user10->email = "arbenz@shukishi.com";
        $user10->password = Hash::make('arbenz1234');
        $user10->status = 1;
//        $user->role = "user";
        $user10->save();

        $user11 = new \App\User();
        $user11->name = "Ing shukishi";
        $user11->email = "ing@shukishi.com";
        $user11->password = Hash::make('ing1234');
        $user11->status = 1;
//        $user->role = "user";
        $user11->save();

        $user12 = new \App\User();
        $user12->name = "Arnon shukishi";
        $user12->email = "arnon@shukishi.com";
        $user12->password = Hash::make('arnon1234');
        $user12->status = 1;
//        $user->role = "user";
        $user12->save();








    }
}
