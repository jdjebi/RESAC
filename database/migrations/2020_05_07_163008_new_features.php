<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_features',function (Blueprint $table){
          $table->id();

          $table->string('title');

          $table->text('content');

          $table->unsignedBigInteger('user_author_id')->nullable(true);

          $table->dateTime('created_at', 0)->useCurrent();

          $table->foreign('user_author_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('new_features');
    }
}
