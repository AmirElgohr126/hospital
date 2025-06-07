<?php

use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;
use Illuminate\Routing\Router;

Route::group(['middleware' => 'auth:admin','prefix' => 'dashboard/admin'], function (Router $router) {
    $router->get('/', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    
});


