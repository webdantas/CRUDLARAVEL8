<?php

use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ShowFilesController;
use Illuminate\Support\Facades\Route;

//rota para controladora People
Route::get('/', [PeopleController::class, 'index'])->name('people.index');
Route::post('people', [PeopleController::class, 'store'])->name('people.store');
Route::get('people/destroy/{id}', [PeopleController::class, 'destroy'])->name('people.destroy');
Route::get('people/edit/{id}', [PeopleController::class, 'edit'])->name('people.edit');
Route::post('people/update', [PeopleController::class, 'update'])->name('people.update');

//rota para controladora Arquivos
Route::get('/arquivos', [ShowFilesController::class, 'index'])->name('arquivos.index');
// Route::post('arquivos', [ShowFilesController::class, 'store'])->name('arquivos.store');
// Route::get('arquivos/destroy/{id}', [ShowFilesController::class, 'destroy'])->name('arquivos.destroy');
// Route::get('arquivos/edit/{id}', [ShowFilesController::class, 'edit'])->name('arquivos.edit');
// Route::post('arquivos/update', [ShowFilesController::class, 'update'])->name('arquivos.update');
