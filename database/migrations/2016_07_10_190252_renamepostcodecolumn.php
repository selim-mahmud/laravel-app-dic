<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Renamepostcodecolumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postcode', function ($table) {
            $table->renameColumn('zipcode_id', 'postcode_id');
            $table->renameColumn('zipcode', 'postcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postcode', function ($table) {
            $table->renameColumn('postcode_id', 'zipcode_id');
            $table->renameColumn('postcode', 'zipcode');
        });
    }
}
