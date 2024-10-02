<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
Route::post('clients', [ClientController::class, 'store'])->name('clients.store');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
