<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Affiche la page d'accueil du site lorsque l'utilisateur visite l'URL principale "/".
Route::get('/', [HomeController::class, 'index']);

// Redirige l'utilisateur connecté en fonction de son rôle (par exemple : admin ou utilisateur standard) lorsqu'il visite "/home".
Route::get('/home', [HomeController::class, 'redirect']);

// Middleware pour sécuriser l'accès au tableau de bord
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Création d'un rendez-vous
Route::post('/appointement', [HomeController::class, 'appointement']);

// Consultation des rendez-vous de l'utilisateur
Route::get('/myappointment', [HomeController::class, 'myappointment']);

// Annulation d'un rendez-vous
Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

// Accès à la liste des rendez-vous par l'administrateur
Route::get('/showappointment', [AdminController::class, 'showappointment']); 

// Gestion des utilisateurs par l'administrateur
Route::get('/showusers', [AdminController::class, 'showusers']); 

Route::get('/approved/{id}', [AdminController::class, 'approved']);

Route::get('/canceled/{id}', [AdminController::class, 'canceled']);

Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

Route::get('/updateuser/{id}', [AdminController::class, 'updateuser']); 

Route::post('/edituser/{id}', [AdminController::class, 'edituser']); 


