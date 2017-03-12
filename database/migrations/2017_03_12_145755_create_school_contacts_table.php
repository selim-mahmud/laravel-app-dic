<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_contacts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('school_id')->index()->unsigned();
            $table->string('email');
            $table->string('phone', 15);
            $table->string('address');
            $table->integer('zipcode_id')->index()->unsigned();
            $table->integer('suburb_id')->index()->unsigned();
            $table->integer('city_id')->index()->unsigned();
            $table->integer('state_id')->index()->unsigned();
            $table->integer('country_id')->index()->unsigned();
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
        Schema::dropIfExists('school_contacts');
    }
}
