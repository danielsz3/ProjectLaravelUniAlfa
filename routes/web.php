<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudantController;
use App\Models\Client;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/client/{id}', function (int $id) {
    //buscar o id no bd
    //fzr validate dos dados do cleinte
    dd($id);
}); */


Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::get('clients/{id}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/studants', [StudantController::class, 'index'])->name('studants.index');
Route::get('/studants/create', [StudantController::class, 'create'])->name('studants.create');
Route::get('studants/{id}', [StudantController::class, 'show'])->name('studants.show');
Route::get('/studants/{id}/edit', [StudantController::class, 'edit'])->name('studants.edit');
Route::post('studants', [StudantController::class, 'store'])->name('studants.store');
Route::put('/studants/{id}', [StudantController::class, 'update'])->name('studants.update');
Route::delete('/studants/{id}', [StudantController::class, 'destroy'])->name('studants.destroy');
