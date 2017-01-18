<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('user_id');
            $table->integer('role_id')->index()->unsigned();
            $table->integer('school_id')->index()->unsigned()->nullable();
            $table->bigInteger('facebook_id')->index()->unsigned()->nullable();
            $table->string('name', 100);
            $table->string('display_name', 100)->nullable();
            $table->string('email', 100)->unique();
            $table->string('pass_key')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('reset_key')->nullable();
            $table->rememberToken();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
