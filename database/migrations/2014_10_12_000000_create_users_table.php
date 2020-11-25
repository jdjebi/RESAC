<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('pays');
            $table->string('numero');
            $table->string('password');
            $table->boolean('active')->default(false);
            $table->timestamp('date_inscription')->nullable();
            $table->string('ville')->nullable();
            $table->string('commune')->nullable();
            $table->string('promo1')->nullable();
            $table->string('promo2')->nullable();
            $table->string('emploi')->nullable();
            $table->string('universite')->nullable();
            $table->boolean('is_staff')->default(false);
            $table->string('staff_role')->default("member");
            $table->unsignedInteger('version')->default(3);
            $table->string('photo')->nullable(); 

            $table->boolean('is_superadmin')->default(false); // Version 6

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
