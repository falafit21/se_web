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
    }
}
