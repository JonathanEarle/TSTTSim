<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin;
use App\Http\Livewire\Store;
use App\Http\Livewire\PhonePage;

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

Route::redirect('/', '/store');

Route::prefix('store')->group(function(){    
    Route::get('/',Store::class);
    Route::any('phones/{phone_id}',PhonePage::class);
});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::any('admin',Admin::class)->middleware('can:create,App\Models\Phone');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});