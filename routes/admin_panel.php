<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>'guest'], function (Router $router) {
    $router->get('register', [RegisteredUserController::class, 'create'])->name('register'); // done

    $router->post('register', [RegisteredUserController::class, 'store'])->name('register.store'); // done

    $router->get('login', [AuthenticatedSessionController::class, 'create']); // done

    $router->post('login', [AuthenticatedSessionController::class, 'store'])->name('login'); // done

    $router->get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request'); // done

    $router->post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    $router->get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

    $router->post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::group(['middleware' => 'auth'], function (Router $router) {
    $router->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    $router->post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
