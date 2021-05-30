<?php

use App\Http\Controllers\PeopleController;
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



//rota para controladora People
Route::get('/', [PeopleController::class, 'index'])->name('people.index');
Route::post('people', [PeopleController::class, 'store'])->name('people.store');
Route::get('people/destroy/{id}', [PeopleController::class, 'destroy'])->name('people.destroy');
Route::get('people/edit/{id}', [PeopleController::class, 'edit'])->name('people.edit');
Route::post('people/update', [PeopleController::class, 'update'])->name('people.update');
