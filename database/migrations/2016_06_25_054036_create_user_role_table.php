<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('role_id');
            $table->string('role_title', 100);
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
        Schema::drop('user_role');
    }
}
