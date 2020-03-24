<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('request_ans_user_id')->unsigned();
            $table->string('question');
            $table->text('detail');
            $table->bigInteger('pet_id')->unsigned();
            $table->string('img')->nullable(true);
            $table->timestamps();


            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('request_ans_user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('pet_id')
                    ->references('id')
                    ->on('pets')
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['request_ans_user_id']);
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['pet_id']);
        });
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('posts');
    }
}
