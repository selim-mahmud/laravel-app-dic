<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuburbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suburb', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('suburb_id');
            $table->integer('country_id')->index()->unsigned();
            $table->integer('city_id')->index()->unsigned();
            $table->string('name', 100);
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
        Schema::drop('suburb');
    }
}