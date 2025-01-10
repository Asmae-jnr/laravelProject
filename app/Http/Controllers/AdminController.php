<?php

namespace App\Http\Controllers;
use App\Models\Appointement;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Affiche tous les rendez-vous dans la vue admin.showappointment
    public function showappointment(){
        $data=appointement::all(); // Récupère tous les rendez-vous depuis la base de données

        return view('admin.showappointment', compact('data')); // Transmet les données à la vue
    }

    // Affiche tous les utilisateurs et leurs rendez-vous dans la vue admin.showusers
    public function showusers(){
        $data=user::all();
        $data = User::with('appointments')->get(); // Charge chaque utilisateur avec ses rendez-vous
        return view('admin.showusers', compact('data')); // Transmet les données à la vue
    }

    // Change le statut d'un rendez-vous spécifique à 'approved'
    public function approved($id){

        $data=appointement::find($id); // Trouve le rendez-vous par son ID
        
        $data->status='approved'; // Met à jour le statut
        $data->save(); // Sauvegarde les modifications
        return redirect()->back(); // Retourne à la page précédente
    }

    // Change le statut d'un rendez-vous spécifique à 'canceled'
    public function canceled($id){

        $data=appointement::find($id); // Trouve le rendez-vous par son ID
        
        $data->status='canceled'; // Met à jour le statut
        $data->save(); // Sauvegarde les modifications
        return redirect()->back(); // Retourne à la page précédente
    }

    public function deleteuser($id){
        $data=user::find($id); // Trouve l'utilisateur par son ID
        
        $data->delete(); // Supprime l'utilisateur de la base de données
        return redirect()->back(); // Retourne à la page précédente
    }

    // Affiche les informations d'un utilisateur spécifique pour modification
    public function updateuser($id){
        $data=user::find($id);
        $data = user::with('appointments')->find($id); // Charge l'utilisateur avec son rendez-vous associé
        return view('admin.updateuser', compact('data')); // Transmet les données à la vue
    }

    // Modifie les informations d'un utilisateur et, si applicable, celles de son rendez-vous
    public function edituser(Request $request, $id) {
        $user = user::find($id); // Trouve l'utilisateur par son ID
        $user->name = $request->name; // Met à jour le nom
        $user->email = $request->email; // Met à jour l'email
        $user->phone = $request->phone; // Met à jour le téléphone
        $user->save(); // Sauvegarde les modifications

        // Vérifie s'il existe un rendez-vous lié à cet utilisateur
        if ($user->appointement) {
            $appointement = $user->appointement; // Récupère le rendez-vous lié
            $appointement->time = $request->time; // Met à jour l'heure
            $appointement->save(); // Sauvegarde les modifications
        }

        return redirect()->back(); // Retourne à la page précédente
    }
}
