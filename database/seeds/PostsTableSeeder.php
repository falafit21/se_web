<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{

    public function run()
    {
        $post = new Post;
        $post->user_id = 1;
        $post->request_ans_user_id = 2;
        $post->question = "หมาไม่ยอมกินข้าวทำไรดีครับ";
        $post->detail = "เมื่อ 3 วันก่อนมันกินไก้ติดคอ หลังจากนั้นมันก็ bully ไก่ไปเลยครับ ทำยังไงดีครับ";
        $post->pet_id = 1;
        $post->save();

        $post1 = new Post;
        $post1->user_id = 1;
        $post1->request_ans_user_id = 2;
        $post1->question = "แมวไม่ยอมถ่ายมนถาดทำไรดี ???";
        $post1->detail = "หนูซื้อบ้านอวกาศแมวมา ทำให้มันไม่ไปถ่ายในถาดเลย ทำไรดี ถ่ายแต่ในบ้านอวกาศ";
        $post1->pet_id = 1;
        $post1->save();
    }
}
