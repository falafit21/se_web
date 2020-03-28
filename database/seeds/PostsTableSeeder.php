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
        $post->detail = "เมื่อ 3 วันก่อนมันกินไก่ติดคอ หลังจากนั้นมันก็ bully ไก่ไปเลยครับ ทำยังไงดีครับ";
        $post->pet_id = 1;
        $post->save();

        $post1 = new Post;
        $post1->user_id = 1;
        $post1->request_ans_user_id = 2;
        $post1->question = "แมวไม่ยอมถ่ายในถาดทำไรดี ???";
        $post1->detail = "หนูซื้อบ้านอวกาศสำหรับให้แมวถ่ายมา ทำให้มันไม่ยอมเข้าไปเลย ทำไงดี ถ่ายแต่ในถาดเหมือนเดิม";
        $post1->pet_id = 1;
        $post1->save();

        $post2 = new Post;
        $post2->user_id = 7;
        $post2->request_ans_user_id = 6;
        $post2->doc_already_ans = 1;
        $post2->question = "หมาที่บ้านอาเจียนเป็นเลือด ??";
        $post2->detail = "เมื่อประมาณอาทิตย์ที่แล้วหมาของผมมันไปกินอาหาร ของหมาข้างบ้าน ทำให้ 2-3 วันต่อมา มันมีอาการอาเจียนเป็นเลือด ควรทำอย่างไรดี";
        $post2->pet_id = 2;
        $post2->save();

        $post3 = new Post;
        $post3->user_id = 7;
        $post3->request_ans_user_id = 6;
        $post3->question = "แมวที่บ้านอาการไม่ค่อยดี";
        $post3->detail = "แมวมีอาการ ไม่สนใจอะไรเลย อาหารไม่ค่อยกิน สงสัยว่ามันอาจจะประชด ที่ไม่ยอมหาเพื่อนให้มันครับ";
        $post3->pet_id = 2;
        $post3->save();
    }
}
