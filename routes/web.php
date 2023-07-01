<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
//     ->middleware('auth')
//     ->name('logout');

Route::get('/home', [HomeController::class, 'index']);
// Customer login
Route::get('/customer/login', [CustomerController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer/login', [CustomerController::class, 'login']);

// Customer transactions
Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', [CustomerController::class, 'showTransactions'])->name('customer.transactions');
    Route::post('/customer/deposit', [CustomerController::class, 'deposit'])->name('customer.deposit');
    Route::post('/customer/withdraw', [CustomerController::class, 'withdraw'])->name('customer.withdraw');
});
// Route::get('/customer/transactions', [CustomerController::class, 'showTransactions'])->name('customer.transactions');
// Route::post('/customer/deposit', [CustomerController::class, 'deposit'])->name('customer.deposit');
// Route::post('/customer/withdraw', [CustomerController::class, 'withdraw'])->name('customer.withdraw');

Route::get('/banker/login', [BankController::class, 'showLoginForm'])->name('banker.login');
Route::post('/banker/login', [BankController::class, 'login'])->name('banker.login.submit');
Route::middleware('auth:banker')->group(function () {
    Route::get('/banker/accounts', [BankController::class, 'showAccounts'])->name('banker.accounts');
    Route::get('/banker/accounts/{user}', [BankController::class, 'showTransactions'])->name('banker.accounts.transactions');
});
