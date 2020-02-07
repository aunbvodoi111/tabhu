<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('status');
            $table->string('lang');
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('cates')->onDelete('cascade');
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
        Schema::dropIfExists('subcates');
    }
}
