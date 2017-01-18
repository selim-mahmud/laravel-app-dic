<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('instructor_id');
            $table->integer('school_id')->index()->unsigned();
            $table->string('name', 100);
            $table->string('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->string('length_of_experience', 100)->nullable();
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
        Schema::drop('instructor');
    }
}
