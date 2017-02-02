<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('school_id')->index()->unsigned()->nullable();
            $table->bigInteger('facebook_id')->index()->unsigned()->nullable();
            $table->string('name', 100);
            $table->string('display_name', 100)->nullable();
            $table->string('email', 100)->unique();
            $table->string('pass_key')->nullable();
            $table->string('status', 20);
            $table->string('reset_key')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
