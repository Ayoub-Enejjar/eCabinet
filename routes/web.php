<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\SecretaireController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/doctors', [AdminController::class, 'doctors'])->name('doctors');
    Route::get('/secretaries', [AdminController::class, 'secretaries'])->name('secretaries');
    Route::get('/patients', [AdminController::class, 'patients'])->name('patients');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

    Route::post('/doctors', [AdminController::class, 'createDoctor'])->name('doctors.store');
    Route::post('/secretaries', [AdminController::class, 'createSecretary'])->name('secretaries.store');
    Route::post('/patients', [PatientController::class, 'register'])->name('patients.store');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.destroy');
});

// Patient Portal Routes
Route::middleware(['auth'])->prefix('patient')->name('patient.')->group(function () {
    Route::get('/', [PatientController::class, 'dashboard'])->name('dashboard');
    Route::get('/rendezvous', [PatientController::class, 'appointments'])->name('appointments');
    Route::get('/rendezvous/nouveau', [PatientController::class, 'bookAppointment'])->name('appointments.create');
    Route::post('/rendezvous', [PatientController::class, 'requestAppointment'])->name('appointments.store');
    Route::get('/dossier', [PatientController::class, 'medicalRecord'])->name('dossier');
    Route::get('/parametres', [PatientController::class, 'settings'])->name('settings');
    Route::patch('/parametres', [PatientController::class, 'updateSettings'])->name('settings.update');
});
//secretary portal routes
Route::middleware(['auth'])->prefix('secretary')->name('secretary.')->group(function () {
    Route::get('/dashboard' , [SecretaireController::class , 'dashboard'])->name('dashboard');
    Route::get('/parametres' , [SecretaireController::class , 'settigns'])->name('parametres');
    Route::get('/patients' , [SecretaireController::class , 'patients'])->name('patients');
    Route::get('/rendezVous' , [SecretaireController::class , 'rendezVous'])->name('rendezVous');
    Route::get('/rendezVousAnnulee' , [SecretaireController::class , 'rvAnnulle'])->name('rvAnnulle');
    Route::patch('/rendezvous/{rv}/confirm', [RendezVousController::class, 'confirmer'])->name('confirm');
    Route::patch('/rendezvous/{id}/cancel', [RendezVousController::class, 'annuler'])->name('cancel');


});


require __DIR__.'/auth.php';
