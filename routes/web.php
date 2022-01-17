<?php

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


Auth::routes();

Route::post('follow/{user}' , [\App\Http\Controllers\FollowController::class , 'store']);

Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/', [\App\Http\Controllers\PostController::class  , 'index' ]);
Route::post('/p' , [\App\Http\Controllers\PostController::class , 'store']);
Route::get('/p/create' , [\App\Http\Controllers\PostController::class , 'create']);
Route::get('/p/{post}' , [\App\Http\Controllers\PostController::class , 'show']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
