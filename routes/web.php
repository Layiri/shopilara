<?php

use App\Http\Controllers\CollectController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopifyAuthController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::resource('/', HomeController::class);

Route::get('/', [HomeController::class, 'index'])->name('home.index');

//Route::get('/shopify_store/generatetoken/{id}', [ShopifyAuthController::class, 'get_token'])->name('shopify.get_token');
//Route::get('/shopify_store/getdata/{id}', [ShopifyAuthController::class, 'getdata']);


//Route::resource('product', ProductController::class);
//
//Route::resource('collection', CollectionController::class);
Route::get('/collection/{id}/index', [CollectionController::class, 'index'])->name('collection.index');

//Route::get('/shopify_store/', [ShopifyAuthController::class, 'index'])->name('shopify_store.index');
//Route::get('/shopify_store/create', [ShopifyAuthController::class, 'create'])->name('shopify_store.create');
//Route::post('/shopify_store/store', [ShopifyAuthController::class, 'store'])->name('shopify.store');
Route::get('/shopify_store/{id}/install', [ShopifyAuthController::class, 'install']);
Route::get('/shopify_store/generate_token', [ShopifyAuthController::class, 'generate_token']);
Route::get('/shopify_store/{id}/get_data', [ShopifyAuthController::class, 'get_data']);
Route::resource('shopify_store', ShopifyAuthController::class);
//Route::post('/shopify_store/create', [ShopifyAuthController::class, 'store'])->name('shopify.store');
////Route::post('/shopify_store/edit', [ShopifyAuthController::class, 'edit'])->name('shopify.edit');
//
//
//
//
//Route::resource('collect', CollectController::class);


