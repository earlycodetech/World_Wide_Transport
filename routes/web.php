<?php

use App\Http\Controllers\LocationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::get('about-the-class', [PagesController::class, 'about'])->name('shiloh');


Route::get('user', [PagesController::class, 'get_user']);

Route::get("/info/{name}/{age}", [PagesController::class, "get_info"])->where([
    'name' => "[a-zA-Z]+",
    'age'=> "[0-9]+"
]);

Route::get('/shop', [PagesController::class, "shop"]);


Route::get('products/{name}/{qty}', [ProductsController::class, 'get_price']);
/*
    Types:
    1. get - Select/Display
    2. Post - 
    3. put
    4. Patch
    5. Delete



    3 products 

    Create a new Route called products, this should have two route parameters 
    name and quantity

    Create a new controller for the route and in the function

    Write a condition to check the product and return a price based on the 
    quantity on the view.


    product price

    iphone 50#  3

    emmanuel.odobo@earlycode.net
*/ 
// Auth::routes([
//     'register' => false
// ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('locations', LocationsController::class);

Route::middleware('auth')->get('profile', [ProfileController::class, 'show_profile'])->name('user.profile');
Route::middleware('auth')->patch('profile', [ProfileController::class, 'update_profile'])->name('user.profile.update');