<?php

use Illuminate\Database\Seeder;

class QuestionFormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new \App\QuestionForm();
        $question->question = "How are your pet respiration?";
        $question->save();

        $question1 = new \App\QuestionForm();
        $question1->question = "How are your pet walking?";
        $question1->save();

        $question2 = new \App\QuestionForm();
        $question2->question = "Does your pet Limping?";
        $question2->save();
    }
}
