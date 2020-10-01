<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user')->nullable(true);

            $table->foreign('user') // Validé par
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreignId('user_id') // Auteur de la publication
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->string('scope')->default("Public"); // Portée de la publication
            
            $table->enum('type', ['','info', 'bourse','stage','job','event'])->default("info"); // Type de la publication
            
            $table->string('type2')->nullable(true); // Autre type
            
            $table->text('content'); // Contenu de la publication
            
            $table->boolean('is_active')->default(false); // La publication est elle bloquée ?
            
            $table->integer('version')->default("2"); // Version de la publication
            
            $table->enum('status',[0,1,2])->default(0);	// Etat de la publication - Brouillon; Publiée; Bloquée
            
            $table->enum('validate_status',[0,1,2,3])->default(3);	// Date de validation de la publication
            
            $table->boolean('validate')->default(false); // Etat de validation

            $table->unsignedBigInteger('validate_by')->nullable(true);

            $table->foreign('validate_by') // Validé par
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            
            $table->dateTime('validate_at')->nullable(); // Date de validation de la publication ancienne version

            $table->timestamp('validated_at',0)->nullable(); // Date de validation de la publication

            $table->timestamp('date')->useCurrent(); // Date de création de la publication ancienne version
            
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
        Schema::dropIfExists('posts');
    }
}
