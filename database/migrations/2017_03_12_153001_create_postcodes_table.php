<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postcodes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('country_id')->index()->unsigned();
            $table->integer('state_id')->index()->unsigned();
            $table->integer('city_id')->index()->unsigned();
            $table->string('suburb', 100)->index();
            $table->string('postcode', 6)->index();
            $table->string('lat', 100);
            $table->string('lon', 100);
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
        Schema::dropIfExists('postcodes');
    }
}
