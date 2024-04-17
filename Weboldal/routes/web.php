<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;

/* Login */
Route::get('/',[UserController::class, 'Reg']);
Route::post('/',[UserController::class, 'RegData']);
Route::view('/login', 'login');
Route::post('/login', [UserController::class, 'Login']);
Route::get('/logout', [UserController::class, 'Logout']);
/* Profil */
Route::view('/profil', 'profil');
Route::post('/profil', [ProfileController::class, 'NewProfile']);
Route::get('/sajatprofil',[ProfileController::class, 'SajatProfil']);
Route::get('/modositas',[ProfileController::class, 'ProfMod']);
Route::get('/profil/{id}',[ProfileController::class,'GetProfileData']);
Route::post('/profil/{id}', [ProfileController::class, 'ProfileMod']);
Route::get('/felhasznalok',[ProfileController::class, 'Felhasznalok']);
Route::get('/adatlap/{id}',[ProfileController::class, 'Adatlap']);
/* Message */
Route::get('/new-msg/{id}',[MessageController::class, 'NewMsg']);
Route::post('/new-msg/{id}',[MessageController::class, 'NewMsgData']);
Route::get('/uzenetek',[MessageController::class,'Uzenetek']);
Route::get('/msg-read/{id}',[MessageController::class,'MsgRead']);
Route::post('/msg-read/{id}',[MessageController::class,'MsgResponse']);
Route::post('/send/{id}',[MessageController::class,'SendMessage']);


/* Mas Nézetek */
Route::get('/rolunk', [ProfileController::class, 'Rolunk']);
Route::get('/letoltes', [ProfileController::class, 'Letoltes']);

