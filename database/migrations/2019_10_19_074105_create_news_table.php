<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->string('short_title');
            $table->string('view');
            $table->string('lang');
            $table->text('description');
            $table->integer('status');
            $table->integer('subcate_id')->unsigned();
            $table->foreign('subcate_id')->references('id')->on('subcates')->onDelete('cascade');
            $table->integer('subcate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('cates')->onDelete('cascade');
            $table->integer('subphu_id')->unsigned();
            $table->foreign('subphu_id')->references('id')->on('subphus')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('news');
    }
}
