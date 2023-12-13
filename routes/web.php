<?php

// App::setlocale('en'); change language
// Route::resource('proyects',PortafolioController::class)->only(['index','store']); //incluye solo:
// Route::resource('proyects',PortafolioController::class)->except(['index','store']); //excluye

use App\Http\Controllers\MessagesControllers;
use App\Http\Controllers\ProyectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', ['nombre' => 'Wilder'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contacto');
// Route::resource('project','ProyectController');

// Route::resource('project', ProyectController::class)->parameters(['project'=> 'wilder']);// change name variable
// Route::resource('project', ProyectController::class)->names('project'); //change name
Route::resource('project', ProyectController::class);

// Route::get('/portafolio', [ProyectController::class, '__invoke'])->name('project.index');
// Route::get('/portafolio/create', [ProyectController::class, 'create'])->name('project.create');
// Route::get('/portafolio/{id}', [ProyectController::class, 'show'])->name('project.show');
// Route::get('/portafolio/{proyect}/edit', [ProyectController::class, 'edit'])->name('project.edit');
// Route::post('/portafolio', [ProyectController::class, 'store'])->name('project.store');
// Route::put('portafolio/{proyect}', [ProyectController::class, 'update'])->name('project.update');
// Route::delete('portafolio/{proyect}', [ProyectController::class, 'destroy'])->name('project.destroy');

// Route::resource('proyects', PortafolioController::class); //apiResource o resource
Route::post('/contact', [MessagesControllers::class, 'store']);

// Auth::routes();
Auth::routes(['register'=>false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
