<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin;
use App\Http\Livewire\Store;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('admin',Admin::class);
Route::get('admin',Admin::class);

Route::post('store',Store::class);
Route::get('store',Store::class);