<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/dashboard/auth.php';

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', function () {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('dashboard.admin');
        } elseif (auth()->guard('web')->check()) {
            return redirect()->route('dashboard.user');
        }
        return view('welcome');
    })->name('welcome');
});
