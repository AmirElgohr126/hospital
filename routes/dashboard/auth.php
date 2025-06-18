<?php
use App\Http\Controllers\Dashboard\Users\UserDashboardController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;


$localizationPrefix = LaravelLocalization::setLocale();
$localizationMiddleware = ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'];

Route::group([
        'prefix' => $localizationPrefix,
        'middleware' => $localizationMiddleware
    ],
    function () {
        Route::group(['middleware' => 'guest'], function (Router $router) {
            $router->get('register', [RegisteredUserController::class, 'create'])->name('register'); // done
            $router->post('register', [RegisteredUserController::class, 'store'])->name('register.store'); // done
            $router->get('login', [AuthenticatedSessionController::class, 'create']); // done
            $router->post('login', [AuthenticatedSessionController::class, 'store'])->name('login'); // done
            $router->get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request'); // done
            $router->post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email'); // done
            $router->get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');   // done
            $router->post('reset-password', [NewPasswordController::class, 'store'])->name('password.store'); // done
        });

        Route::post('admin/logout', [AdminDashboardController::class, 'logout'])
            ->name('admin.logout')
            ->middleware('auth:admin'); // done

        Route::post('user/logout', [UserDashboardController::class, 'logout'])
            ->name('user.logout')
            ->middleware('auth:web');
        require __DIR__ . '/admin.php';
        require __DIR__ . '/user.php';

    }
);
