<?php

use App\Livewire\MenuComponent;
use App\Livewire\NewComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('menu');
});

Route::get('/ar', function () {
    return view('archivos');
});
Route::post('/menu', MenuComponent::class);

Route::post('/add-components', NewComponent::class);
