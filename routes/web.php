<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

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

Route::get('/', [OrderController::class, 'katalog']);
Route::get('/katalog', [OrderController::class, 'katalog']);
Route::get('/order', [OrderController::class, 'index']);
Route::post('/checkout', [OrderController::class, 'checkout']);
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);
Route::post('/order/save', [OrderController::class, 'saveOrder'])->name('saveOrder');

route::get('order-direct', [PaymentController::class, 'directApi']);
route::post('payment-api', [PaymentController::class, 'paymentApi']);
route::post('va', [PaymentController::class, 'virtualAccount']);
route::post('mandiri', [PaymentController::class, 'mandiriBill']);
route::post('qris', [PaymentController::class, 'qris']);
route::post('gopay', [PaymentController::class, 'gopay']);
route::post('credit-card', [PaymentController::class, 'creditCard']);
