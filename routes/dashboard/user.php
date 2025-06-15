<?php


use App\Http\Controllers\Dashboard\Users\UserDashboardController;
use Illuminate\Routing\Router;

Route::group(['middleware' => 'auth:web','prefix' => 'dashboard/user'], function (Router $router) {
    $router->get('/', [UserDashboardController::class, 'index'])->name('dashboard.user');

});

