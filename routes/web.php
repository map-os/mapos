<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Auth\LoginController;
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

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => true,
]);

Route::redirect('/', '/login');

Route::get('/tenant', [TenantController::class, 'selectTenant'])->name('tenant');
Route::get('/access/{id}', [TenantController::class, 'setTenant'])->name('tenant.access');

Route::get('/logout', [LoginController::class, 'logout']);

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'tenant'],
], function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Customers
    Route::resource('/customers', CustomerController::class);

    // Products
    Route::resource('/products', ProductController::class);

    // Services
    Route::resource('/services', ServiceController::class);

    // Users
    Route::resource('/users', UserController::class);
});
