<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetGenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_genes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('gene');
            $table->bigInteger('pet_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('pet_type_id')
                ->references('id')
                ->on('pet_types')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('pet_genes', function (Blueprint $table) {
            $table->dropForeign(['pet_type_id']);
        });
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('pet_genes');
    }
}
