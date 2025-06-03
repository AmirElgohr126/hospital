<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'admin-panel'], function (Router $router) {
    $router->get('/', [DashboardController::class,'index']);
});
