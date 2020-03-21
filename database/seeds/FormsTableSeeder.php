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
        $form->answer = "answer 1";
        $form->save();

        $form1 = new \App\Form();
        $form1->post_id = 1;
        $form1->question_form_id = 2;
        $form1->answer = "answer 2";
        $form1->save();

        $form3 = new \App\Form();
        $form3->post_id = 1;
        $form3->question_form_id = 3;
        $form3->answer = "answer 3";
        $form3->save();

        $form4 = new \App\Form();
        $form4->post_id = 2;
        $form4->question_form_id = 1;
        $form4->answer = "answer 1";
        $form4->save();

        $form5 = new \App\Form();
        $form5->post_id = 2;
        $form5->question_form_id = 2;
        $form5->answer = "answer 2";
        $form5->save();

        $form6 = new \App\Form();
        $form6->post_id = 2;
        $form6->question_form_id = 3;
        $form6->answer = "answer 3";
        $form6->save();

        $form7 = new \App\Form();
        $form7->post_id = 3;
        $form7->question_form_id = 1;
        $form7->answer = "answer 1";
        $form7->save();

        $form8 = new \App\Form();
        $form8->post_id = 3;
        $form8->question_form_id = 2;
        $form8->answer = "answer 2";
        $form8->save();

        $form9 = new \App\Form();
        $form9->post_id = 3;
        $form9->question_form_id = 3;
        $form9->answer = "answer 3";
        $form9->save();
    }
}
