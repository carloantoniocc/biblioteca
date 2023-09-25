<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthstates', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('user_id')->unsigned()->default(1);
            $table->integer('weight')->unsigned();
            $table->integer('water')->unsigned();
            $table->integer('runkilometer')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('healthstates');
    }
};
