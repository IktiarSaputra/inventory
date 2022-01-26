<?php

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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/dashboard/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
        Route::post('/dashboard/profile/change-profile', [App\Http\Controllers\HomeController::class, 'store'])->name('change.profile');
        Route::post('/dashboard/profile/change-password', [App\Http\Controllers\HomeController::class, 'password'])->name('change.password');
        Route::get('/dashboard/expense', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard.expense');
        Route::get('/dashboard/income', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard.income');
        Route::get('/supplier/{id}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('delete.suplier');
        Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('delete.category');
        Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('delete.product');
        Route::get('/expense/{id}', [App\Http\Controllers\ExpensesController::class, 'destroy'])->name('delete.expense');
        Route::get('/income/{id}', [App\Http\Controllers\IncomeController::class, 'destroy'])->name('delete.income');
        Route::get('/productIn/delete/{id}/{product_id}', [App\Http\Controllers\ProductInController::class, 'destroy'])->name('productIn.delete');
        Route::get('/productOut/delete/{id}', [App\Http\Controllers\ProductOutController::class, 'destroy'])->name('productIn.delete');
        Route::resource('category', App\Http\Controllers\CategoryController::class)->except(['create', 'show']);
        Route::resource('suplier', App\Http\Controllers\SupplierController::class)->except(['create', 'show']);
        Route::resource('product', App\Http\Controllers\ProductController::class);
        Route::get('download-qr-code/{type}', [App\Http\Controllers\ProductController::class, 'downloadQRCode'])->name('qrcode.download');
        Route::resource('productIn', App\Http\Controllers\ProductInController::class)->except(['show']);
        Route::post('/checkout/', [App\Http\Controllers\ProductOutController::class, 'checkout'])->name('productOut.checkout');
        Route::resource('productOut', App\Http\Controllers\ProductOutController::class);
        Route::resource('expense', App\Http\Controllers\ExpensesController::class)->except(['show']);
        Route::get('/expense/pdf/{daterange}', [App\Http\Controllers\ExpensesController::class, 'export'])->name('report.expense_pdf');
        Route::resource('income', App\Http\Controllers\IncomeController::class)->except(['show']);
        Route::get('/income/pdf/{daterange}', [App\Http\Controllers\IncomeController::class, 'export'])->name('report.income_pdf');
        Route::get('/search/{kode}',[App\Http\Controllers\ProductOutController::class, 'search']);
        Route::get('/product/add-to-cart/{code}', [App\Http\Controllers\ProductOutController::class, 'addToCart'])->name('add.to.cart');
        Route::patch('/update-cart', [App\Http\Controllers\ProductOutController::class, 'update'])->name('update.cart');
        Route::delete('/remove-from-cart', [App\Http\Controllers\ProductOutController::class, 'remove'])->name('remove.from.cart');
        Route::get('/transaksi/succes/{invoice}',[App\Http\Controllers\ProductOutController::class, 'success'])->name('productOut.success');
        Route::get('/transaksi/pdf/{invoice}', [App\Http\Controllers\ProductOutController::class, 'export'])->name('productOut.export');
    });
});
