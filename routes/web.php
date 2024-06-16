<?php

use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
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
    $category = Category::all();
    $product = Product::where('is_accept', true)->get();
    return view('welcome', compact('category', 'product'));
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('admin/user', UserController::class);
    Route::get('admin/store', [StoreController::class, 'index'])->name('store.index');
});


Route::middleware(['auth', 'isHaveStore'])->group(function () {
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

Route::get('product/{product}', [ProductController::class, 'userShow'])->name('user.product.show');
Route::get('store/{store}', [StoreController::class, 'userShow'])->name('user.store.show');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('admin/store/store', [StoreController::class, 'store'])->name('store.store');
    Route::put('admin/confirm/store/{store}', [StoreController::class, 'confirm'])->name('store.confirm');
    Route::put('admin/confirm/product/{product}', [ProductController::class, 'confirm'])->name('product.confirm');
    Route::get('admin/store/create', [StoreController::class, 'create'])->name('store.create');
    Route::get('admin/store/{store}/edit', [StoreController::class, 'edit'])->name('store.edit');
    Route::put('admin/store/{store}', [StoreController::class, 'update'])->name('store.update');
    Route::delete('admin/store/{store}', [StoreController::class, 'destroy'])->name('store.destroy');


    Route::post('admin/merchant/store/{store}', [MerchantController::class, 'store'])->name('merchant.store');
    Route::delete('admin/merchant/{merchant}/delete', [MerchantController::class, 'destroy'])->name('merchant.destroy');
});

require __DIR__ . '/auth.php';
