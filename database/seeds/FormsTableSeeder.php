<?php

use Illuminate\Database\Seeder;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $form = new \App\Form();
        $form->post_id = 1;
        $form->question_form_id = 1;
        $form->answer = "เป็นปกติ แต่มีเสียงดังบ้างบางจังหวะ";
        $form->save();

        $form1 = new \App\Form();
        $form1->post_id = 1;
        $form1->question_form_id = 2;
        $form1->answer = "เดินปกติ";
        $form1->save();

        $form3 = new \App\Form();
        $form3->post_id = 1;
        $form3->question_form_id = 3;
        $form3->answer = "มีอาการน่าสงสัย แต่ไม่ทราบว่าเกิดจากสาเหตุใด";
        $form3->save();

        $form4 = new \App\Form();
        $form4->post_id = 2;
        $form4->question_form_id = 1;
        $form4->answer = "เป็นปกติ แต่มีเสียงดังบ้างบางจังหวะ";
        $form4->save();

        $form5 = new \App\Form();
        $form5->post_id = 2;
        $form5->question_form_id = 2;
        $form5->answer = "ขาน่าจะไม่ปกติ 1 ข้าง เพราะมันเคยมีประวัติการรักษา";
        $form5->save();

        $form6 = new \App\Form();
        $form6->post_id = 2;
        $form6->question_form_id = 3;
        $form6->answer = "มีอาการน่าสงสัย แต่ไม่ทราบว่าเกิดจากสาเหตุใด";
        $form6->save();

        $form7 = new \App\Form();
        $form7->post_id = 3;
        $form7->question_form_id = 1;
        $form7->answer = "เป็นปกติ แต่มีเสียงดังบ้างบางจังหวะ";
        $form7->save();

        $form8 = new \App\Form();
        $form8->post_id = 3;
        $form8->question_form_id = 2;
        $form8->answer = "ขาน่าจะไม่ปกติ 1 ข้าง เพราะมันเคยมีประวัติการรักษา";
        $form8->save();

        $form9 = new \App\Form();
        $form9->post_id = 3;
        $form9->question_form_id = 3;
        $form9->answer = "มีอาการน่าสงสัย แต่ไม่ทราบว่าเกิดจากสาเหตุใด";
        $form9->save();

        $form10 = new \App\Form();
        $form10->post_id = 4;
        $form10->question_form_id = 1;
        $form10->answer = "เป็นปกติ แต่มีเสียงดังบ้างบางจังหวะ";
        $form10->save();

        $form11 = new \App\Form();
        $form11->post_id = 4;
        $form11->question_form_id = 2;
        $form11->answer = "เรื่องเดินไม่มีปัญหา";
        $form11->save();

        $form12 = new \App\Form();
        $form12->post_id = 4;
        $form12->question_form_id = 3;
        $form12->answer = "มีอาการน่าสงสัย แต่ไม่ทราบว่าเกิดจากสาเหตุใด แต่ไม่รุนแรง ไม่น่าเป็นห่วง";
        $form12->save();
    }
}
