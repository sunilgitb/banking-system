<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AccountController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::post('transactions/deposit', [AccountController::class, 'deposit']);

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});



// Customer Login
Route::post('customer/login', [AuthController::class, 'customerLogin']);

// Banker Login
Route::post('banker/login', [AuthController::class, 'bankerLogin']);

// Transactions
Route::middleware('auth:api')->group(function () {
    Route::get('transactions', [AccountController::class, 'getTransactions']);
    Route::post('transactions/withdraw', [AccountController::class, 'withdraw']);
});

// Banker Accounts
Route::middleware('auth:api')->group(function () {
    Route::get('accounts', [AccountController::class, 'getAccounts']);
    Route::get('accounts/{id}/transactions', [AccountController::class, 'getAccountTransactions']);
});
