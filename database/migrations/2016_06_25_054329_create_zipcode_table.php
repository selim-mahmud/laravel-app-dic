<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zipcode', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('zipcode_id');
            $table->integer('country_id')->index()->unsigned();
            $table->integer('city_id')->index()->unsigned();
            $table->integer('suburb_id')->index()->unsigned();
            $table->string('zipcode', 10);
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
        Schema::drop('zipcode');
    }
}
