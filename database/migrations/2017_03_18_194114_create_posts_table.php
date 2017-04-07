<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->index()->unsigned();
            $table->integer('user_id')->index()->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->text('excerpt');
            $table->text('body');
            $table->string('feature_image')->default('');
            $table->string('feature_image_thumbnail')->default('');
            $table->string('published');
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
        Schema::dropIfExists('posts');
    }
}
