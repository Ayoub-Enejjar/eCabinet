<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('addDoctor' , [AdminController::class , 'createDoctor']);
Route::post('addSecretary' , [AdminController::class , 'createSecretary']);
Route::post('addPatient' , [AdminController::class , 'createPatient']);
Route::get('stats' , [AdminController::class , 'viewGlobalStats']);


Route::post('login' , [UserController::class, 'login']);
Route::post('logout' , [UserController::class, 'logout'])->middleware('auth:sanctum');


Route::post('register' , [PatientController::class , 'register']);

Route::post('/rendezvous', [PatientController::class, 'requestAppointment']);
Route::patch('/rendezvous/{id}/confirm', [RendezVousController::class, 'confirmer']);
Route::patch('/rendezvous/{id}/cancel', [RendezVousController::class, 'annuler']);

