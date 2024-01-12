<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MessagesControllers;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectsRestart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', ['nombre' => 'Wilder'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contacto');
Route::resource('project', ProjectController::class);

Route::resource('wilder', ProjectsRestart::class);

Route::get('categorias/{category}', [CategoriesController::class, 'store'])->name('categories.show');

Route::post('portafolio/{proyect}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
Route::delete('portafolio/{proyect}/forceDelete', [ProjectController::class, 'forceDelete'])->name('projects.forceDelete');

Route::post('/contact', [MessagesControllers::class, 'store']);

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/test', public function () {
//         return "hola mundo";
//     });
// });

Auth::routes();

// App::setlocale('en'); change language
// Route::resource('proyects',PortafolioController::class)->only(['index','store']); //incluye solo:
// Route::resource('proyects',PortafolioController::class)->except(['index','store']); //excluye

// use Illuminate\Support\Facades\DB; //muestra las consultas realizadas
// DB::listen( function($query) {
//     var_dump($query->sql);
// } );
// Route::resource('proyects', PortafolioController::class); //apiResource o resource

// Route::resource('project','ProjectController');

// Route::resource('project', ProjectController::class)->parameters(['project'=> 'wilder']);// change name variable
// Route::resource('project', ProjectController::class)->names('project'); //change name
// Route::post('/portafolio/{project}/restore', [ProjectController::class,'restore'])->name('projects.restore');
// Route::post('asd/{project}/asd', [App\Http\Controllers\ProjectController::class, 'nuevo']);

// Auth::routes(['register'=>false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/portafolio', [ProjectController::class, '__invoke'])->name('project.index');
// Route::get('/portafolio/create', [ProjectController::class, 'create'])->name('project.create');
// Route::get('/portafolio/{id}', [ProjectController::class, 'show'])->name('project.show');
// Route::get('/portafolio/{proyect}/edit', [ProjectController::class, 'edit'])->name('project.edit');
// Route::post('/portafolio', [ProjectController::class, 'store'])->name('project.store');
// Route::delete('/portafolio/{project}/forceDelete', [ProjectController::class,'forceDelete'])->name('projects.forceRestore');
