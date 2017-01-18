<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor_type', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('instructor_type_id');
            $table->integer('instructor_id')->index()->unsigned();
            $table->integer('skill_type_id')->index()->unsigned();
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
        Schema::drop('instructor_type');
    }
}
