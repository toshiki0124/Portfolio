<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('title',30);
            $table->char('body', 255)->nullable();
            $table->bigInteger('place_id')->unsigned();
            $table->char('detail_place',200);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('place_id')->references('id')->on('places');
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
