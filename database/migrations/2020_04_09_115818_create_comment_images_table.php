<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('comment_id')->unsigned();;
            $table->string('image');
            $table->timestamps();

            $table->foreign('comment_id')
            ->references('id')
            ->on('comments')
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
        Schema::table('comment_images', function (Blueprint $table) {
            $table->dropForeign(['comment_id']);
        });
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('comment_images');
    }
}
