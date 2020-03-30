<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone_number')->nullable();
            $table->string('graduated')->nullable();
            $table->string('work_at')->nullable();
            $table->string('license_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors_info');
    }
}