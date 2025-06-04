<?php
namespace App\Repositories\Admin;

use App\Repositories\BaseRepository;

interface AdminRepository extends BaseRepository
{


    public function adminCreate($data);

    public function adminShow($data);

    public function adminUpdateProfile($data);

    public function adminUpdatePassword($data);




}
