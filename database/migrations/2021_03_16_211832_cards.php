<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('picture');
            $table->integer('price');
            $table->text('description');
            $table->integer('likes');
            $table->integer('views');
        });
        Schema::create('cards_nl', function (Blueprint $table){
            $table->id();
            $table->bigInteger('card_id');
            $table->string('name');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
        Schema::dropIfExists('cards_nl');
    }
}
