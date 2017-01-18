<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_address', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('address_id');
            $table->string('owner_type', 100);
            $table->integer('owner_id')->index()->unsigned();
            $table->string('address');
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
        Schema::drop('contact_address');
    }
}
