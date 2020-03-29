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

        $comment = new \App\Comment;
        $comment->post_id = 2;
        $comment->user_id = 4;
        $comment->comment = "ต้องไปพบหมอแล้วนะ ปล่อยไปจะเป็นอันตราย";
        $comment->save();

        $comment = new \App\Comment;
        $comment->post_id = 3;
        $comment->user_id = 6;
        $comment->comment = "ต้องมาพบหมอแล้วนะ ปล่อยไปจะเป็นอันตราย";
        $comment->save();
    }
}
