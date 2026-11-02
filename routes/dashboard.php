<?php

use App\Http\Controllers\Dashboard\ClassroomsController;
use App\Http\Controllers\Dashboard\CurriculaController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GradeLevelsController;
use App\Http\Controllers\Dashboard\Hr\HrController;
use App\Http\Controllers\Dashboard\Hr\HrDepartmentsController;
use App\Http\Controllers\Dashboard\StudentsController;
use App\Http\Controllers\Dashboard\SubjectsController;
use App\Http\Controllers\Dashboard\TeachersController;
use App\Http\Controllers\Dashboard\TracksController;
use App\Http\Controllers\Dashboard\TwoFactorAuthenticatableController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::group(
    [
        'prefix' => '/admin/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['auth:admin']
    ],
    function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('index');
        Route::get('/classrooms', [ClassroomsController::class, 'index'])->name('classrooms.index');
        Route::get('/classrooms/create', [ClassroomsController::class, 'create'])->name('classrooms.create');
        Route::post('/classrooms/store', [ClassroomsController::class, 'store'])->name('classrooms.store');
        Route::delete('/classrooms/{classroom}/destroy', [ClassroomsController::class, 'destroy'])->name('classrooms.destroy');
        Route::get('/classrooms/{classroom}/edit', [ClassroomsController::class, 'edit'])->name('classrooms.edit');
        Route::get('/classrooms/{classroom}/show', [ClassroomsController::class, 'show'])->name('classrooms.show');
        Route::put('/classrooms/{classroom}/update', [ClassroomsController::class, 'update'])->name('classrooms.update');
        Route::get('/classrooms/{classroom}/teachers', [ClassroomsController::class, 'teachers'])->name('classrooms.teachers');
        Route::get('/classrooms/{classroom}/students', [ClassroomsController::class, 'students'])->name('classrooms.students');
        Route::get('/2fa', [TwoFactorAuthenticatableController::class, 'index'])->name('admin.2fa');

        Route::resource('teachers', TeachersController::class);
        Route::resource('students', StudentsController::class);
        Route::resource('tracks', TracksController::class);
        Route::resource('subjects', SubjectsController::class);
        Route::resource('gradelevels', GradeLevelsController::class);
        Route::resource('curricula', CurriculaController::class);
        Route::get('/curricula/{curriculum}/subjects', [CurriculaController::class, 'subjects'])->name('curricula.subjects');
       //HR
        Route::prefix('hr')->as('hr.')->group(function () {
            Route::get('/', [HrController::class, 'index'])->name('index');
            Route::resource('departments', HrDepartmentsController::class);
        });
    }
);
