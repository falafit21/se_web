<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('weight');
            $table->bigInteger('pet_id')->unsigned();;
            $table->timestamps();

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
        Schema::table('weight_histories', function (Blueprint $table) {
            $table->dropForeign(['pet_id']);
        });
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('weight_histories');
    }
}
