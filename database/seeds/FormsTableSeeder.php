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
        $form->answer = 1;
        $form->save();

        $form1 = new \App\Form();
        $form->post_id = 1;
        $form1->question_form_id = 2;
        $form1->answer = 1;
        $form1->save();

        $form3 = new \App\Form();
        $form3->post_id = 1;
        $form3->question_form_id = 3;
        $form3->answer = 0;
        $form3->save();
    }
}
