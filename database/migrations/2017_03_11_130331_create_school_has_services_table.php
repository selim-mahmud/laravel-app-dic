<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolHasServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_has_services', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('school_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->primary(['school_id', 'service_id']);
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
        Schema::dropIfExists('school_has_services');
    }
}
