<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new \App\Comment;
        $comment->post_id = 2;
        $comment->user_id = 7;
        $comment->comment = "ลองให้น้องทานตับดูครับ";
        $comment->save();

        $comment1 = new \App\Comment;
        $comment1->post_id = 2;
        $comment1->user_id = 4;
        $comment1->comment = "ต้องไปพบหมอแล้วนะ ปล่อยไปจะเป็นอันตราย";
        $comment1->save();

        $comment2 = new \App\Comment;
        $comment2->post_id = 3;
        $comment2->user_id = 6;
        $comment2->comment = "ต้องมาพบหมอแล้วนะ ปล่อยไปจะเป็นอันตราย";
        $comment2->save();

        $comment3 = new \App\Comment;
        $comment3->post_id = 5;
        $comment3->user_id = 6;
        $comment3->comment = "เช่นเดียวกับมนุษย์ ปริมาณของอาหารทีแมวควรรับประทานแตกต่างกันไปในแต่ละตัว ดังนั้นอาหารของฮิลส์จึงได้แนบคู่มือการให้อาหารสัตว์ในบรรจุภัณฑ์ทุกห่อ เพื่อช่วยให้ท่านสามารถคำนวนปริมาณอาหารที่เหมาะสมสำหรับสัตว์เลี้ยงของท่าน อย่างไรก็ตามคู่มือนี้เป็นเพียงจุดเริ่มต้นเท่านั้น ทั้งนี้สุขภาพสัตว์เลี้ยงของท่านขึ้นอยู่กับตรวจร่างกายอย่างสม่ำเสมอ และการปรับปริมาณอาหารให้เป็นไปตามความต้องการของร่างกาย ท่านสามารถศึกษาคู่มือในการให้อาหารสัตว์เลี้ยงของเราได้ กรุณาไปที่หน้าผลิตภัณฑ์ของเรา";
        $comment3->save();

        $comment4 = new \App\Comment;
        $comment4->post_id = 5;
        $comment4->user_id = 4;
        $comment4->comment = "ถองถามร้ายขายอาหารดูมั้ย น่าจะรู้ได้นะ";
        $comment4->save();
    }
}
