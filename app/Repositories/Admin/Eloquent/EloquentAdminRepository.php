<?php

namespace App\Repositories\Admin\Eloquent;

use App\Repositories\EloquentBaseRepository;
use App\Repositories\Admin\AdminRepository;


class EloquentAdminRepository extends EloquentBaseRepository implements AdminRepository
{



    public function adminCreate($data)
    {

        $admin = $this->model->create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]
        );
        return $admin;
    }


    public function adminShow($userId)
    {
        $admin = $this->model->find($userId);

        return $admin;
    }


    public function adminUpdateProfile($data)
    {
        $user = auth('admin')->user();
        $this->update($user, $data);
        return $user;
    }

    public function adminUpdatePassword($data)
    {
        $user = auth('admin')->user();
        $user->password = bcrypt($data['password']);
        $user->save();
        return $user;
    }
}
