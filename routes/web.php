<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name('home');
Route::get("/adminpanel", [HomeController::class, "index"])->name('admin.index');

