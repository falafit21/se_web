<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('pet_type_id')->unsigned();
            $table->bigInteger('pet_size_id')->unsigned()->nullable();
            $table->float('weight');
            $table->date('birth_date');
            $table->timestamps();

            $table->foreign('pet_type_id')
                    ->references('id')
                    ->on('pet_types')
                    ->onDelete('cascade');

            $table->foreign('pet_size_id')
                    ->references('id')
                    ->on('pet_sizes')
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
        Schema::table('pets', function(Blueprint $table){
            $table->dropForeign(['pet_type_id']);
        });
        Schema::table('pets', function(Blueprint $table){
            $table->dropForeign(['pet_size_id']);
        });
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('pets');
    }
}
