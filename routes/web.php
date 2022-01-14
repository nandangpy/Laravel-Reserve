<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Customer\LocationController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\BarberController;
use App\Http\Controllers\Customer\OrderController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('home', HomeController::class);
Route::get('/', [HomeController::class, 'index']);
Route::get('/appointment', [HomeController::class, 'appointment']);

Route::group([
    'middleware' => ['auth' => 'CheckRole:customer']
], function () {
    
    Route::resource('/cart', LocationController::class);
    Route::post('/location/{id}', [LocationController::class, 'location'])->name('location');

    
    Route::resource('order', OrderController::class);
    Route::get('order/{id}', [OrderController::class, 'kurir']);
    
    Route::post('jasa', [OrderController::class, 'jasa'])->name('jasa');

    Route::resource('history', HistoryController::class);
    
});

Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth',
], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
    Route::post('/register',  [RegisterController::class, 'store'])->name('register');
    Route::view('/profile', 'pages.auth.profile')->name('profile');
});




Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth' => 'CheckRole:admin']
], function () {
    Route::resource('layanan', LayananController::class);
    Route::resource('barber', BarberController::class);
});
