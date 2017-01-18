<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnContactAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_address', function ($table) {
            $table->integer('country_id')->index()->unsigned();
            $table->integer('city_id')->index()->unsigned();
            $table->integer('suburb_id')->index()->unsigned();
            $table->integer('zipcode_id')->index()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('contact_address', function ($table) {
            $table->dropColumn('country_id');
            $table->dropColumn('city_id');
            $table->dropColumn('suburb_id');
            $table->dropColumn('zipcode_id');
        });
    }
    
}
