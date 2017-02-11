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
            $table->integer('school_id')->index()->unsigned()->default(0);
            $table->bigInteger('facebook_id')->index()->unsigned()->default(0);
            $table->string('name', 100);
            $table->string('display_name', 100)->default('');
            $table->string('email', 100)->unique()->default('');
            $table->string('pass_key')->default('');
            $table->string('status', 20)->default('inactive');
            $table->string('reset_key')->default('');
            $table->rememberToken()->default('');
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
