<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Affiche la page d'accueil du site lorsque l'utilisateur visite l'URL principale "/".
Route::get('/', [HomeController::class, 'index']);

// Redirige l'utilisateur connecté en fonction de son rôle (par exemple : admin ou utilisateur standard) lorsqu'il visite "/home".
Route::get('/home', [HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/appointement', [HomeController::class, 'appointement']);

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

Route::get('/showappointment', [AdminController::class, 'showappointment']); 

Route::get('/showusers', [AdminController::class, 'showusers']); 

Route::get('/approved/{id}', [AdminController::class, 'approved']);

Route::get('/canceled/{id}', [AdminController::class, 'canceled']);

Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

Route::get('/updateuser/{id}', [AdminController::class, 'updateuser']); 

Route::post('/edituser/{id}', [AdminController::class, 'edituser']); 


