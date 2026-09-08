<?php

use App\Http\Controllers\Dashboard\ClassroomsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::group([
    'prefix' => '/admin/dashboard',
    'as' => 'dashboard.',
    'middleware' =>['auth']
],
 function(){
    Route::get('/index',[ DashboardController::class,'index'])->name('index');
    Route::get('/classrooms',[ClassroomsController::class, 'index'])->name('classrooms.index');
    Route::get('/classrooms/create',[ClassroomsController::class, 'create'])->name('classrooms.create');
    Route::post('/classrooms/store',[ClassroomsController::class, 'store'])->name('classrooms.store');
    Route::delete('/classrooms/{classroom}/destroy',[ClassroomsController::class, 'destroy'])->name('classrooms.destroy');
    Route::get('/classrooms/{classroom}/edit',[ClassroomsController::class, 'edit'])->name('classrooms.edit');
    Route::get('/classrooms/{classroom}/show',[ClassroomsController::class, 'show'])->name('classrooms.show');
    Route::put('/classrooms/{classroom}/update',[ClassroomsController::class, 'update'])->name('classrooms.update');
});

