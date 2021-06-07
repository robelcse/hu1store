<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Home;
use App\Http\Controllers\order;

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

Route::get('/','Home@index');
Route::get('giftcard', [Home::class, 'giftcard']);
Route::post('order', [order::class, 'placeOrder']);
Route::post('giftcard', [order::class, 'giftCard']);
Route::get('thankyou/{txId}', [Home::class, 'thankyou']);
Route::get('check-giftcard/{giftNo}', [Home::class, 'giftCardDetails']);
Route::get('product-thankyou/{txId}', [Home::class, 'productThankyou']);

Route::get('support', [Home::class, 'support']);
Route::get('userterms', [Home::class, 'userterms']);

//Route::get('my-post', [Home::class, 'myPost']);

