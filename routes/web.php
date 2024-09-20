<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;
// use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');




// Route pour le tableau de bord (sans middleware d'authentification)
Route::get('/dashboard', function () {
    return view('home.dashboard');
})->name('dashboard');


// Routes protégées par authentification (facultatif, si vous ne voulez pas utiliser l'authentification pour ces routes, vous pouvez les commenter ou les supprimer)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes pour les pages d'accueil
Route::controller(HomeController::class)->group(function () {
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/metier', [HomeController::class, 'metier'])->name('home.metier');
    Route::get('/devenirartisan', [HomeController::class, 'devenirartisan'])->name('home.devenirartisan');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('home.dashboard');
});

// Routes pour l'inscription (si nécessaire, mais vous avez déjà une inscription pour les prestataires)
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Routes pour la connexion
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

// Route pour la déconnexion
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');




Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

// Route pour la recherche de prestataires
// Route::get('/search-service', [ProviderController::class, 'search'])->name('providers.search');


// Routes pour les prestataires
Route::get('/prestataires/create', [PrestataireController::class, 'create'])->name('prestataires.create');
Route::post('/prestataires', [PrestataireController::class, 'store'])->name('prestataires.store');


// pour mon compte
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


// Route pour afficher le formulaire de connexion
Route::get('prestataires/connexion', [PrestataireController::class, 'showLoginForm'])->name('prestataires.login.form');

// Route pour traiter la connexion
Route::post('prestataires/connexion', [PrestataireController::class, 'login'])->name('prestataires.login.submit');

Route::post('/services', [ServiceController::class, 'store'])->name('services.store');




// Afficher la page de connexion admin
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');

// Soumettre la connexion admin
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

// // Tableau de bord admin, accessible uniquement aux administrateurs authentifiés
// Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');




// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
// });
