<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Collections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table){
           $table->foreignId('user_id')->constrained('users');
           $table->foreignId('card_id')->constrained('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collections', function (Blueprint $table){
           $table->dropForeign('collections_user_id_foreign');
           $table->dropForeign('collections_card_id_foreign');
        });
        Schema::dropIfExists('collections');
    }
}
