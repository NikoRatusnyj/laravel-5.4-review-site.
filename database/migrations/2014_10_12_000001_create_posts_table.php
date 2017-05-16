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
            $table->unsignedInteger('comp_id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
        Schema::table('posts', function ($table){
            $table->foreign('comp_id')->references
            ('id')->on('companies')->
            onDelete('cascade');
        });
            Schema::table('posts', function ($table){
            $table->foreign('user_id')->references
            ('id')->on('users')->
            onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   Schema::dropForeign(['comp_id']);
        Schema::dropForeign(['user_id']);
        Schema::dropIfExists('posts');
    }
}
