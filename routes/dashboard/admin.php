<?php

use Illuminate\Routing\Router;
use App\Http\Controllers\Dashboard\Admin\DoctorController;
use App\Http\Controllers\Dashboard\Admin\SectionController;
use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;

Route::group(['middleware' => 'auth:admin','prefix' => 'dashboard/admin'], function (Router $router) {
    // =======================================================================================================
    // sections routes
    // =======================================================================================================
    $router->get('/', [AdminDashboardController::class, 'index'])->name('dashboard.admin');
    $router->get('/sections', [SectionController::class, 'index'])->name('dashboard.admin.sections.index');
    $router->post('/sections/store', [SectionController::class, 'store'])->name('dashboard.admin.sections.store');
    $router->post('/sections/{id}', [SectionController::class, 'update'])->name('dashboard.admin.sections.update');
    $router->delete('/sections/{id}', [SectionController::class, 'destroy'])->name('dashboard.admin.sections.destroy');
    // =======================================================================================================
    // doctors routes
    // =======================================================================================================
    $router->get('/doctors', [DoctorController::class, 'index'])->name('dashboard.admin.doctors.index');
    $router->get('/doctors/create', [DoctorController::class, 'create'])->name('dashboard.admin.doctors.create');
    $router->post('/doctors/store', [DoctorController::class, 'store'])->name('dashboard.admin.doctors.store');
    $router->get('/doctors/edit/{id}', [DoctorController::class, 'edit'])->name('dashboard.admin.doctors.edit');
    $router->put('/doctors/update/{id}', [DoctorController::class, 'update'])->name('dashboard.admin.doctors.update');
    $router->get('/doctors/{id}', [DoctorController::class, 'show'])->name('dashboard.admin.doctors.show');
    $router->delete('/doctors/{id}', [DoctorController::class, 'destroy'])->name('dashboard.admin.doctors.destroy');
});




