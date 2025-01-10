<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointement;

class HomeController extends Controller
{
    // Redirige les utilisateurs en fonction de leur rôle (admin ou utilisateur standard)
    public function redirect() {
        if (Auth::id()) { // Vérifie si l'utilisateur est connecté
            if (Auth::user()->usertype == '0') { // Vérifie si c'est un utilisateur standard
                return view('user.home'); // Affiche la vue pour l'utilisateur standard
            } else {
                return view('admin.home'); // Affiche la vue pour l'administrateur
            }
        } else {
            return redirect()->back(); // Redirige vers la page précédente si l'utilisateur n'est pas connecté
        }
    }

    // Affiche la page d'accueil de l'utilisateur
    public function index() {
        return view('user.home'); // Retourne la vue de l'utilisateur
    }

    // Enregistre une demande de rendez-vous
    public function appointement(Request $request) {
        $data = new appointement; // Crée une nouvelle instance de rendez-vous
        $data->name = $request->name; // Associe le nom
        $data->email = $request->email; // Associe l'email
        $data->date = $request->date; // Associe la date
        $data->time = $request->time; // Associe l'heure
        $data->message = $request->message; // Associe le message
        $data->status = 'In progress'; // Définit le statut initial

        if (Auth::id()) {
            $data->user_id = Auth::user()->id; // Associe l'utilisateur connecté
        }

        $data->save(); // Sauvegarde les informations
        return redirect()->back()->with('message', 'Appointment request successful. We will contact you soon'); // Retourne un message de confirmation
    }

    // Affiche les rendez-vous d'un utilisateur connecté
    public function myappointment() {
        if (Auth::id()) { // Vérifie si l'utilisateur est connecté
            $userid = Auth::user()->id; // Récupère l'ID de l'utilisateur
            $appoint = appointement::where('user_id', $userid)->get(); // Récupère les rendez-vous de l'utilisateur
            return view('user.my_appointment', compact('appoint')); // Transmet les données à la vue
        } else {
            return redirect()->back(); // Redirige vers la page précédente si l'utilisateur n'est pas connecté
        }
    }

    // Annule un rendez-vous spécifique
    public function cancel_appoint($id) {
        $data = appointement::find($id); // Trouve le rendez-vous par son ID
        $data->delete(); // Supprime le rendez-vous
        return redirect()->back(); // Retourne à la page précédente
    }
}
