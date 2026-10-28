<?php

use App\Http\Controllers\KamarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [KamarController::class, 'index'])->name('kamar.index');
Route::get('/detail', [KamarController::class, 'detail'])->name('kamar.detail');
Route::get('/admin', [KamarController::class, 'admin'])->name('kamar.admin');

Route::get('/kamar/tambah', [KamarController::class, 'create'])->name('kamar.create');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');

Route::get('/kamar/{kamar}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
Route::put('/kamar/{kamar}', [KamarController::class, 'update'])->name('kamar.update');

Route::delete('/kamar/{kamar}', [KamarController::class, 'destroy'])->name('kamar.destroy');