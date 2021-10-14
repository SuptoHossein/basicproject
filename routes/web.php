<?php

use App\Http\Controllers\PracticeController;
use App\Http\Controllers\Todo\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::resource('/practice', PracticeController::class);

// Route::view('/todos', 'layouts.web');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('todo', TodoController::class);
});





