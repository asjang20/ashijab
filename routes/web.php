<?php

use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('admin/user', UserController::class);
});


Route::middleware(['auth', 'role:storeadmin', 'isHaveStore'])->group(function () {
    Route::resource(
        'admin/product/',
        ProductController::class,
        ['names' => [
            'index' => 'product.index',
            'store' => 'product.store',
            'update' => 'product.update',
            'create' => 'product.create',
            'destroy' => 'product.destroy',
            'edit' => 'product.edit'
        ]]
    );
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('admin/store/store', [StoreController::class, 'store'])->name('store.store');
    Route::get('admin/store/create', [StoreController::class, 'create'])->name('store.create');
    Route::get('admin/store/{store}/edit', [StoreController::class, 'edit'])->name('store.edit');
    Route::put('admin/store/{store}/update', [StoreController::class, 'update'])->name('store.update');

    Route::post('admin/merchant/store/{store}', [MerchantController::class, 'store'])->name('merchant.store');
    Route::delete('admin/merchant/{merchant}/delete', [MerchantController::class, 'destroy'])->name('merchant.destroy');
});

require __DIR__ . '/auth.php';
