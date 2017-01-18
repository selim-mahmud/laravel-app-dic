<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInSomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_address', function ($table) {
            $table->integer('state_id')->index()->unsigned();
        });

        Schema::table('postcode', function ($table) {
            $table->integer('state_id')->index()->unsigned();
        });

        Schema::table('suburb', function ($table) {
            $table->integer('state_id')->index()->unsigned();
        });

        Schema::table('city', function ($table) {
            $table->integer('state_id')->index()->unsigned();
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
            $table->dropColumn('state_id');
        });

       Schema::table('zipcode', function ($table) {
            $table->dropColumn('state_id');
        });

       Schema::table('suburb', function ($table) {
            $table->dropColumn('state_id');
        });

       Schema::table('city', function ($table) {
            $table->dropColumn('state_id');
        });
    }
    
}
