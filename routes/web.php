<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HtmlToTextController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WordDensityController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/convert', [HtmlToTextController::class, 'convert'])->name('convertToHtml');
Route::resource('word-densities', WordDensityController::class);
