<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Contacts
Route::get('/dashboard', [ContactController::class, 'show'])->name('dashboard');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contacts/{id}/view', [ContactController::class, 'view'])->name('contact.view');
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::post('/contacts/{id}/update', [ContactController::class, 'update'])->name('contact.update');
Route::delete('/contacts/{id}/delete', [ContactController::class, 'destroy'])->name('contact.delete');


