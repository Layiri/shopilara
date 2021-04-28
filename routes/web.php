<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/collection/{id}/index', [CollectionController::class, 'index'])->name('collection.index');
Route::get('/shopify_store/{id}/install', [ShopifyAuthController::class, 'install']);
Route::get('/shopify_store/generate_token', [ShopifyAuthController::class, 'generate_token']);
Route::get('/shopify_store/{id}/get_data', [ShopifyAuthController::class, 'get_data']);
Route::resource('shopify_store', ShopifyAuthController::class);


