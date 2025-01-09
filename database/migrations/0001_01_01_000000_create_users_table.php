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
        // Création de la table 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('name'); // Colonne pour le nom de l'utilisateur
            $table->string('email')->unique(); // Email unique
            $table->string('phone')->nullable(); // Numéro de téléphone (peut être nul)
            $table->string('address')->nullable(); // Adresse (peut être nul)
            $table->string('usertype')->default(0); // Type d'utilisateur avec valeur par défaut '0'
            $table->timestamp('email_verified_at')->nullable(); // Date de vérification de l'email
            $table->string('password'); // Mot de passe
            $table->rememberToken(); // Token pour "Se souvenir de moi"
            $table->foreignId('current_team_id')->nullable(); // Clé étrangère vers une équipe (nullable)
            $table->string('profile_photo_path', 2048)->nullable(); // Chemin de la photo de profil (limité à 2048 caractères)
            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées par Laravel
        });

        // Création de la table 'password_reset_tokens'
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email comme clé primaire
            $table->string('token'); // Token pour réinitialisation
            $table->timestamp('created_at')->nullable(); // Date de création
        });

        // Création de la table 'sessions'
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Identifiant unique de session
            $table->foreignId('user_id')->nullable()->index(); // Référence vers un utilisateur (nullable)
            $table->string('ip_address', 45)->nullable(); // Adresse IP (nullable)
            $table->text('user_agent')->nullable(); // Informations sur l'appareil utilisé
            $table->longText('payload'); // Données stockées dans la session
            $table->integer('last_activity')->index(); // Dernière activité
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
