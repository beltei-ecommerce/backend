<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Authentication
Route::post('/auth/register', [UserController::class, 'register']);
Route::post('/auth/login', [UserController::class, 'login']);
Route::post('/auth/send_request_reset_password', [UserController::class, 'sendRequestResetPassword']);
Route::get('/auth/verify_reset_password', [UserController::class, 'verifyResetPassword']);
Route::post('/auth/reset_password', [UserController::class, 'resetPassword']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/auth/whoami', [UserController::class, 'whoAmI']);
    Route::post('/auth/logout', [UserController::class, 'logout']);
    Route::post('/auth/update_password', [UserController::class, 'updatePassword']);

    Route::resource('products', ProductController::class)->except(['index', 'show']);

    Route::resource('categories', CategoryController::class)->except(['index']);
});
