<?php

namespace App\Repositories\User\Eloquent;

use App\Repositories\EloquentBaseRepository;
use App\Repositories\User\UserRepository;


class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{

    public function userCreate($data)
    {
        $user = $this->model->create($data);
        return $user;
    }


    public function userShow($userId)
    {
        $user = $this->model->find($userId);
        return $user;
    }


    public function userUpdateProfile($data)
    {
        $user = auth('web')->user();
        $this->update($user, $data);
        return $user;
    }

    public function userUpdatePassword($data)
    {
        $user = auth('web')->user();
        $user->password = bcrypt($data['password']);
        $user->save();
        return $user;
    }
}
