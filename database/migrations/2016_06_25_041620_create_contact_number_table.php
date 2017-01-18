<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_number', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('number_id');
            $table->string('owner_type', 100);
            $table->integer('owner_id')->index()->unsigned();
            $table->string('number', 15);
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
        Schema::drop('contact_number');
    }
}
