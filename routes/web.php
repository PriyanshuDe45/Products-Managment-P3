<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\companiesController;
use App\Http\Controllers\productsController;
use Illuminate\Support\Facades\Route;

Route::prefix('01_module_b')->group(function () {

    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAction'])->name('login.action');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Public routes
    Route::get('/verify', [productsController::class, 'verifyForm'])->name('verify');
    Route::post('/verify', [productsController::class, 'verify'])->name('verify.post');
    Route::get('/01/{gtin}', [productsController::class, 'publicShow'])->name('product.public');
    Route::get('/products.json', [productsController::class, 'apiIndex'])->name('api.products');
    Route::get('/products/{gtin}.json', [productsController::class, 'apiShow'])->name('api.product');

    // Admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/companies', [companiesController::class, 'index'])->name('company.index');
        Route::get('/companies/deactivated', [companiesController::class, 'deactivated'])->name('company.deactivated');
        Route::get('/companies/create', [companiesController::class, 'create'])->name('company.create');
        Route::post('/companies', [companiesController::class, 'store'])->name('company.store');
        Route::get('/companies/{company}', [companiesController::class, 'show'])->name('company.show');
        Route::get('/companies/{company}/edit', [companiesController::class, 'edit'])->name('company.edit');
        Route::put('/companies/{company}', [companiesController::class, 'update'])->name('company.update');
        Route::post('/companies/{company}/deactivate', [companiesController::class, 'deactivate'])->name('company.deactivate');

        Route::get('/products', [productsController::class, 'index'])->name('product.index');
        Route::get('/products/new', [productsController::class, 'create'])->name('product.create');
        Route::post('/products', [productsController::class, 'store'])->name('product.store');
        Route::get('/products/{gtin}', [productsController::class, 'show'])->name('product.show');
        Route::put('/products/{gtin}', [productsController::class, 'update'])->name('product.update');
        Route::post('/products/{gtin}/hide', [productsController::class, 'hide'])->name('product.hide');
        Route::delete('/products/{gtin}', [productsController::class, 'destroy'])->name('product.destroy');
    });

});
