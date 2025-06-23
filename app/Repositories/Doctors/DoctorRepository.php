<?php
namespace App\Repositories\Doctors;

use App\Repositories\BaseRepository;

interface DoctorRepository extends BaseRepository
{
    public function getAllDoctors();

    public function adminDeleteSelected($ids);


    public function getAllPaginatedDoctors();

    public function adminCreate($data);

    public function adminUpdate($model, $data);

    public function adminDelete($model);




}
