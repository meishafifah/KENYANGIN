<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');

// middleware harus login
Route::middleware('auth')->group(function() {

    Route::get('/cart', [BuyController::class, 'index'])->name('cart.index');
    Route::post('/cart/add-to-cart/{restaurant:id}/{menu:id}', [BuyController::class, 'addToCart'])->name('addToCart');
    Route::put('/cart/update/{cart:id}', [BuyController::class, 'update'])->name('cart.update');
    Route::delete('/cart/destroy/{cart:id}', [BuyController::class, 'destroy'])->name('cart.destroy');
    Route::get('/cart/checkout', [BuyController::class, 'checkout'])->name('cart.checkout');

    Route::post('/create-invoice', [BuyController::class, 'createIinvoice'])->name('create.invoice');
    Route::get('/show-invoice', [BuyController::class, 'showInvoice'])->name('show.invoice');

    // middleware harus admin
    Route::middleware('CheckAdmin')->group(function() {
        Route::get('/restaurant/create', [RestaurantController::class, 'create'])->name('restaurant.create');
        Route::post('/restaurant/store', [RestaurantController::class, 'store'])->name('restaurant.store');
        // model:column
        Route::get('/restaurant/edit/{restaurant:slug}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
        Route::put('/restaurant/update/{restaurant:slug}', [RestaurantController::class, 'update'])->name('restaurant.update');
        Route::delete('/restaurant/delete/{restaurant:slug}', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');

        Route::get('/menu/create/{restaurant:slug}', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/menu/store/{restaurant:slug}', [MenuController::class, 'store'])->name('menu.store');

        Route::get('/menu/edit/{menu:id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/menu/update/{menu:id}', [MenuController::class, 'update'])->name('menu.update');
        Route::get('/menu/destroy/{menu:id}', [MenuController::class, 'destroy'])->name('menu.destroy');
               
    });
});

Route::get('/restaurant/show/{restaurant:slug}', [RestaurantController::class, 'show'])->name('restaurant.show');



