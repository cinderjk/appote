<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Login;

use App\Livewire\Dashboard;
use App\Livewire\Transaction;
use App\Livewire\Product;
use App\Livewire\Customer;
use App\Livewire\Report;


Route::get('/', Login::class)->name('login');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('transaction', Transaction::class)->name('transaction');
    Route::get('product', Product::class)->name('product');
    Route::get('customer', Customer::class)->name('customer');
    Route::get('report', Report::class)->name('report');
    

    Route::get('logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('logout');
});
