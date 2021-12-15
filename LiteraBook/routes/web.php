<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BooksToReads;
use App\Http\Livewire\Notes;
use App\Http\Livewire\Quotes;
use Illuminate\Http\Request;

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

Route::get('to-read', BooksToReads::class)->name('to-read');
Route::get('note', Notes::class)->name('note');
Route::get('quote', Quotes::class)->name('quote');
