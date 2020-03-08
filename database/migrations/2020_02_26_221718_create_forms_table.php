<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id')->unsigned();
            $table->bigInteger('question_form_id')->unsigned();
            $table->string('answer')->nullable();
            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            $table->foreign('question_form_id')
                    ->references('id')
                    ->on('question_forms')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('forms', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
        });
        Schema::table('forms', function (Blueprint $table) {
            $table->dropForeign(['question_form_id']);
        });
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('forms');
    }
}
