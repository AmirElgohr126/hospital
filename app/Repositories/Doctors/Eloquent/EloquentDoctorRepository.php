<?php

namespace App\Repositories\Doctors\Eloquent;

use App\Repositories\Doctors\DoctorRepository;
use App\Repositories\EloquentBaseRepository;

class EloquentDoctorRepository extends EloquentBaseRepository implements DoctorRepository
{

    public function getAllPaginatedDoctors()
    {
        return $this->allPaginated();
    }

    public function getAllDoctors()
    {
        return $this->all();
    }

    public function adminCreate($data)
    {
        if (isset($data['profile_picture'])) {
            $data['profile_picture'] = $this->saveImage($data['profile_picture'], 'doctors');
        }
        return $this->create($data);
    }



    public function adminUpdate($model, $data)
    {
        // Delete the old image if it exists
        if (isset($data['profile_picture'])) {
            if ($model->profile_picture) {
                $this->deleteImage($model->profile_picture, 'doctors');
                $data['profile_picture'] = $this->saveImage($data['profile_picture'], 'doctors');
            }
        } else {
            unset($data['profile_picture']);
        }
        return $this->update($model, $data);
    }


    public function adminDelete($model)
    {
        if ($model->profile_picture) {
            $this->deleteImage($model->profile_picture, 'doctors');
        }
        return $this->delete($model);
    }
}
