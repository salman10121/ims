<?php

use App\Http\Controllers\AjaxPracticeController;
use App\Http\Middleware\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderItemController;


Route::get('/', function () {
    return view('home');
});
Route::get('register', [App\Http\Controllers\UserController::class, 'create'])->name('register');
Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');

Route::get('/users/login/page', [App\Http\Controllers\AuthController::class, 'loginpage'])->name('users.loginpage');
Route::post('/users/login', [App\Http\Controllers\AuthController::class, 'login'])->name('users.login');


// Route::middleware(['login'])->group(function () {
Route::middleware([Login::class])->group(function () {

    // ✅ Only accessible after login
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'show'])->name('profile.show');

    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard.show');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'reportDashboard'])->name('dashboard.index');

    Route::resource('items', App\Http\Controllers\ItemController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);

    Route::get('stocks/add', [App\Http\Controllers\ProductController::class, 'addStock'])->name('stocks.add');
    Route::post('stocks/reduce', [App\Http\Controllers\ProductController::class, 'reduceStock'])->name('stocks.reduce');
    Route::get('stocks/logs', [App\Http\Controllers\ProductController::class, 'stockLogs'])->name('stocks.logs');

    Route::resource('orders', App\Http\Controllers\OrderController::class);
    Route::resource('order-items', App\Http\Controllers\OrderItemController::class);
    Route::resource('units', \App\Http\Controllers\UnitController::class);
    Route::resource('brands', \App\Http\Controllers\BrandController::class);
    Route::resource('suppliers', \App\Http\Controllers\SupplierController::class);
    Route::resource('customers', \App\Http\Controllers\CustomerController::class);

    Route::get('/chat', [\App\Http\Controllers\ChatController::class, 'index'])->name('chats.index');
    Route::post('/chat/send', [\App\Http\Controllers\ChatController::class, 'store'])->name('chat.send');


    Route::resource('ajaxpractice', AjaxPracticeController::class);



    // Logout route (also needs to be inside auth)
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('users.loginpage')->with('success', 'Logged out successfully!');
    })->name('logout');
});
