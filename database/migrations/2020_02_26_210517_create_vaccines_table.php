<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('pet_type_id')->unsigned();
            $table->integer('activate_range');
            $table->text('prevent_symptom');
            $table->timestamps();

            $table->foreign('pet_type_id')
                ->references('id')
                ->on('pet_types')
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
        Schema::table('vaccines', function(Blueprint $table){
            $table->dropForeign(['pet_type_id']);
        });
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('vaccines');
    }
}
