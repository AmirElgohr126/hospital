<?php

use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;
use App\Http\Controllers\Dashboard\Admin\SectionController;
use Illuminate\Routing\Router;

Route::group(['middleware' => 'auth:admin','prefix' => 'dashboard/admin'], function (Router $router) {
    $router->get('/', [AdminDashboardController::class, 'index'])->name('dashboard.admin');
    $router->get('/sections', [SectionController::class, 'index'])->name('dashboard.admin.sections.index');
    $router->post('/sections/store', [SectionController::class, 'store'])->name('dashboard.admin.sections.store');
    $router->post('/sections/{id}', [SectionController::class, 'update'])->name('dashboard.admin.sections.update');
    $router->delete('/sections/{id}', [SectionController::class, 'destroy'])->name('dashboard.admin.sections.destroy');

});




