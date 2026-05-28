<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeecontroller;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    // Employee routes
    Route::get('employee', [employeecontroller::class, 'index'])->name('employee.index');
    Route::get('employee/create', [employeecontroller::class, 'create'])->name('employee.create');
    Route::post('employee', [employeecontroller::class, 'store'])->name('employee.store');
    Route::get('employee/{id}/edit', [employeecontroller::class, 'edit'])->name('employee.edit');
    Route::put('employee/{id}', [employeecontroller::class, 'update'])->name('employee.update');
    Route::delete('employee/{id}', [employeecontroller::class, 'destroy'])->name('employee.destroy');

    //Profile routes
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
