<?php

namespace App\Repositories\Doctors\Eloquent;

use App\Models\Image;
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
        $doctor = $this->create($data);
        $doctor->image()->create([
            'url' => $data['profile_picture'] ?? null,
            'imageable_type' => 'App\Models\Doctor',
            'imageable_id' => $doctor->id,
        ]);



    }


    public function adminUpdate($model, $data)
    {
        // Delete the old image if it exists
        if (isset($data['profile_picture'])) {
            if ($model->image()->exists()) {
                $this->deleteImage($model->image->url, 'doctors');
                $data['profile_picture'] = $this->saveImage($data['profile_picture'], 'doctors');
                $this->update($model, $data);
                $model->image()->update([
                    'url' => $data['profile_picture'],
                ]);
            }
        } else {
            unset($data['profile_picture']);

        }
        return $this->update($model, $data);
    }


    public function adminDelete($model)
    {
        if ($model->image()->exists()) {
            $this->deleteImage($model->image->url, 'doctors');
        }
        return $this->delete($model);
    }
}
