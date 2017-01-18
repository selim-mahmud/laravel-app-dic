<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school', function (Blueprint $table) {
            Schema::create('school', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('school_id');
                $table->string('name', 200);
                $table->string('display_name')->nullable();
                $table->string('short_desc')->nullable();
                $table->text('long_desc')->nullable();
                $table->string('website')->nullable();
                $table->string('facebook')->nullable();
                $table->string('twitter')->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school', function (Blueprint $table) {
            Schema::drop('school');
        });
    }
}
