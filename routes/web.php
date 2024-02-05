<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserPageController;


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

Route::get('/', [HomeController::class, 'home']);
Route::get('/logout', [LoginController::class, 'logout']);

//product
Route::get('/product', [ProductController::class, 'productPage']);

// cart
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::get('/addCart', [CartController::class, 'addToCart']);
Route::get('/cartElemDel', [CartController::class, 'cartElemDel']);
Route::get('/editQuantity', [CartController::class, 'editQuantity']);

//register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']); 

//login/logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//userPage
// Route::get('/userPage', [UserPageController::class, 'showUserPage'])->middleware('auth');

//checkAuth in userPage
Route::middleware(['auth'])->group(function(){
    Route::get('/userPage', [UserPageController::class, 'showUserPage']);
});