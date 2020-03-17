<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecievedVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recieved_vaccines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pet_id')->unsigned();
            $table->bigInteger('vaccine_id')->unsigned();
            $table->date('received_at');
            $table->date('expire_at');
            $table->timestamps();

            $table->foreign('pet_id')
                    ->references('id')
                    ->on('pets')
                    ->onDelete('cascade');

            $table->foreign('vaccine_id')
                    ->references('id')
                    ->on('vaccines')
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
        Schema::table('recieved_vaccines', function (Blueprint $table) {
            $table->dropForeign(['pet_id']);
        });
        Schema::table('recieved_vaccines', function(Blueprint $table){
            $table->dropForeign(['vaccine_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('recieved_vaccines');
    }
}
