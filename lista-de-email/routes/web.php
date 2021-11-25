<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
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

/*|--------------------------------------------------------------------------
  | AUTENTICACAO->TELA
  |--------------------------------------------------------------------------*/
  Route::get('/', [HomeController::class, 'index'])->name('home');
  //--------------------------------------------------------------------------

/*|--------------------------------------------------------------------------
  | CLIENTES
  |--------------------------------------------------------------------------*/
  Route::get('clientes', [ClientesController::class, 'index'])->name('clientes');
  Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
  Route::post('/clientes/store', [ClientesController::class, 'store'])->name('clientes.store');
  Route::get('clientes/edit/{id}', [ClientesController::class, 'edit'])->name('clientes.edit');
  Route::post('clientes/update/{id}', [ClientesController::class, 'update'])->name('clientes.update');
  //--------------------------------------------------------------------------

/*|--------------------------------------------------------------------------
  | EMAIL
  |--------------------------------------------------------------------------*/
  Route::get('email', [EmailController::class, 'index'])->name('email');
  Route::post('email/enviar', [EmailController::class, 'enviar'])->name('email.enviar');
  //--------------------------------------------------------------------------

