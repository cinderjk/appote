<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Login;


Route::get('/', Login::class)->name('login');

