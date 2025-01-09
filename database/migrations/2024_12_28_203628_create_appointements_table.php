<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointements', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // pour le nom complet
            $table->string('email'); // pour l'email
            $table->date('date'); // pour la date du rendez-vous
            $table->time('time'); // pour l'heure du rendez-vous
            $table->text('message')->nullable(); 
            $table->string('status')->nullable(); 
            $table->unsignedBigInteger('user_id')->nullable(); // clé étrangère vers users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // relation avec la table users
            $table->timestamps(); // pour les champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointements');
    }
};
