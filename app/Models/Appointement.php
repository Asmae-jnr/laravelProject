<?php

namespace App\Models;

// Importation de la classe de base Eloquent
use Illuminate\Database\Eloquent\Model;

/**
 * Classe représentant un rendez-vous (appointment).
 */
class Appointement extends Model
{
    // use HasFactory; // Décommenter si vous avez besoin de créer des instances pour les tests

    /**
     * Liste des champs pouvant être assignés en masse.
     * @var array<string>
     */
    protected $fillable = [
        'name',    // Nom de la personne pour le rendez-vous
        'email',   // Email de la personne
        'date',    // Date du rendez-vous
        'time',    // Heure du rendez-vous
        'message', // Message ou remarque pour le rendez-vous
        'status',  // Statut du rendez-vous (par exemple, confirmé, annulé)
        'user_id', // ID de l'utilisateur associé au rendez-vous
    ];

    /**
     * Définir une relation "many-to-one" entre Appointment et User.
     * Un rendez-vous appartient à un utilisateur.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Liaison avec le modèle User
    }
}
