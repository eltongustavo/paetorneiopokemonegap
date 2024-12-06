<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EquipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home / Inicio
Route::get('/', function() {
    return view('site.home');
})->name('home.index');

// Tutorial
Route::get('/tutorial', function() {
    return view('site.tutorial');
})->name('tutorial.index');

// Login
Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'validatorLogin'])->name('login.validatorLogin');
Route::get('/logoff', [LoginController::class, 'logoff'])->name('login.logoff');

// Resgistration
Route::get('/inscricao', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/inscricao', [RegistrationController::class, 'store'])->name('registration.store');

// AddEquipe
Route::get('/equipe', [EquipeController::class, 'index'])->name('equipe.index');
Route::get('/adicionar-equipe', [EquipeController::class, 'create'])->name('equipe.create');
Route::post('/equipe-envio-banco', [EquipeController::class, 'store'])->name('equipe.store');
Route::get('/equipe-validação', [EquipeController::class, 'validator'])->name('equipe.validator');

// Registereds
Route::get('/inscritos', [EquipeController::class, 'show'])->name('equipe.show');

// ADM
Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard.show');
Route::get('/dashboard-update/{id}/{situation}', [DashboardController::class, 'update'])->name('dasboard.update');
Route::get('/dashboard-destroy/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
Route::get('/dashboard-downloas/{id}', [DashboardController::class, 'download'])->name('dashboard.download');



// Rotas de teste de extends e section

Route::get('/teste', function () {
    return view('ferramentas-teste.layout');
});

Route::get('/teste1', function () {
    return view('ferramentas-teste.home');
});