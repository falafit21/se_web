<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pet_genes_id')->unsigned()->nullable();
            $table->float('breakpoint_start_weight')->nullable();
            $table->float('breakpoint_end_weight')->nullable();
            $table->timestamps();

            $table->foreign('pet_genes_id')
                ->references('id')
                ->on('pet_genes')
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
        Schema::table('weight_statuses', function(Blueprint $table){
            $table->dropForeign(['pet_genes_id']);
        });
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('weight_statuses');
    }
}
