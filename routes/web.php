<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



Route::view('/', 'welcome')->name('welcome');
//Route::get('/profile', fn() => 'profile')->middleware('auth')->name('profile'); //test
Route:: view('/dashboard', 'dashboard')->name('dashboard');

//Route:: view('/dashboard', 'dashboard')->middleware('auth')->name('dashboard');
//Route:: view('/register', 'register')->name('register');
Route:: get('/register', [RegisterController::class, 'create'])->name('register');//middleware('quest')
Route:: post('/register', [RegisterController::class, 'store'])->middleware('quest');

Route:: get('/login', [LoginController::class, 'create'])->name('login');//middleware('quest')
Route:: post('/login', [LoginController::class, 'store'])->middleware('quest');



