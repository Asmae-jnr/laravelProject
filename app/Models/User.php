<?php

namespace App\Models;

// Importation des classes nécessaires
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * Classe représentant un utilisateur dans l'application.
 * Hérite d'Authenticatable pour gérer l'authentification.
 */
class User extends Authenticatable
{
    // Inclusion de traits pour ajouter des fonctionnalités au modèle User
    use HasApiTokens; // Gère les tokens API (pour l'authentification sans session)
    use HasFactory;   // Permet de créer facilement des instances pour les tests
    use HasProfilePhoto; // Gère les photos de profil des utilisateurs
    use Notifiable;   // Permet d'envoyer des notifications à l'utilisateur
    use TwoFactorAuthenticatable; // Active la vérification en deux étapes

    /**
     * Liste des champs pouvant être assignés en masse.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',    // Nom de l'utilisateur
        'email',   // Email de l'utilisateur
        'phone',   // Téléphone de l'utilisateur
        'address', // Adresse de l'utilisateur
        'password' // Mot de passe hashé de l'utilisateur
    ];

    /**
     * Liste des attributs cachés lors de la sérialisation.
     * Ces champs ne seront pas inclus dans les réponses JSON.
     * @var array<int, string>
     */
    protected $hidden = [
        'password',                // Mot de passe (sécurisé)
        'remember_token',          // Jeton de session pour "se souvenir de moi"
        'two_factor_recovery_codes', // Codes de récupération pour 2FA
        'two_factor_secret',       // Clé secrète pour 2FA
    ];

    /**
     * Liste des attributs ajoutés au tableau ou JSON du modèle.
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url', // URL de la photo de profil
    ];

    /**
     * Convertir certains attributs en types spécifiques.
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Convertit les dates en objets DateTime
            'password' => 'hashed',           // Hash automatique pour les mots de passe
        ];
    }

    /**
     * Définir une relation "one-to-many" entre User et Appointment.
     * Un utilisateur peut avoir plusieurs rendez-vous.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointement::class); // Liaison avec le modèle Appointment
    }
}
