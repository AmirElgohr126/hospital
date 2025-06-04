<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function __construct(private AdminRepository $adminRepository, private UserRepository $userRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
    }

    public function create(): View
    {
        return view('dashboard.user.auth.signup');
    }


    public function store(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->registerBasedOnUserType($data);
        return redirect(RouteServiceProvider::HOME);
    }


    public function registerBasedOnUserType($data)
    {
        if($data['user_type'] === 'admin') {
            $user = $this->adminRepository->adminCreate($data);
            event(new Registered($user));
            Auth::guard('admin')->login($user);
        } else {
            $user = $this->userRepository->userCreate($data);
            event(new Registered($user));
            Auth::guard('web')->login($user);
        }
    }

}
