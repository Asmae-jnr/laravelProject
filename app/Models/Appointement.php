<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    //
    // use HasFactory;

    // Définir les champs modifiables
    protected $fillable = [
        'name',
        'email',
        'date',
        'time',
        'message',
        'status',
        'user_id', // Assure-toi d'ajouter user_id dans les fillables
    ];

    // Définir la relation entre Appointment et User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
