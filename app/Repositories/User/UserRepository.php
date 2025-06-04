<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{


    public function userCreate($data);

    public function userShow($data);

    public function userUpdateProfile($data);

    public function userUpdatePassword($data);




}
