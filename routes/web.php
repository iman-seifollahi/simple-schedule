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

Route::get('/', \App\Http\Livewire\Home::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/profile' , \App\Http\Livewire\Profile\Index::class)->name('profileIndex');
    Route::get('/newRequest' , \App\Http\Livewire\Profile\NewRequest::class)->name('newRequest');
    Route::get('/requests' , \App\Http\Livewire\Profile\Requests::class)->name('requests');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
