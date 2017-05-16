<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('comp_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->text('comment');
            $table->timestamps();

        });
        Schema::table('comments', function ($table){
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('comp_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['post_id']);
        Schema::dropForeign(['comp_id']);
        Schema::dropForeign(['user_id']);
        Schema::dropIfExists('companies');

    }
}
