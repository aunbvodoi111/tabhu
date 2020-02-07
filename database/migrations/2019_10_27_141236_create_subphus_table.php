<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubphusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subphus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('status');
            $table->string('lang');
            $table->integer('subcate_id')->unsigned();
            $table->foreign('subcate_id')->references('id')->on('subcates')->onDelete('cascade');
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
        Schema::dropIfExists('subphus');
    }
}
