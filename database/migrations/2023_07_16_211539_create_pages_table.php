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
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name')->unique();
            $table->text('content');
            $table->integer('workspace_id')->unsigned()->default(1);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('workspace_id')->references('id')->on('workspaces')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
