<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('img_path')->nullable();
            $table->boolean('status');
            $table->enum('role', ['admin', 'doctor', 'user'])->default('user');
            $table->bigInteger('doctor_info_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('doctor_info_id')
                ->references('id')
                ->on('doctors_info')
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
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign(['doctor_info_id']);
        });
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('users');
    }
}