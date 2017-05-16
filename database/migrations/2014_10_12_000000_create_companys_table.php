<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('companyname');
            $table->longText('description');
            $table->integer('kvk');
            $table->string('logo')->default('defaultlogo.jpg');
            $table->string('adres');
            $table->string('telnr');
            $table->string('email')->unique();
            $table->string('password');
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

        Schema::dropIfExists('companys');
    }
}
