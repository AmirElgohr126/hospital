<?php

namespace App\Repositories\Doctors\Eloquent;

use App\Models\Day;
use App\Models\Image;
use App\Repositories\Doctors\DoctorRepository;
use App\Repositories\EloquentBaseRepository;

class EloquentDoctorRepository extends EloquentBaseRepository implements DoctorRepository
{


    public function getAllPaginatedDoctors()
    {
        return $this->allPaginated();
    }

    public function adminDeleteSelected($ids)
    {
        $doctors = $this->findByMany($ids);
        foreach ($doctors as $doctor) {
            if ($doctor->image()->exists()) {
                $this->deleteImage($doctor->image->url, 'doctors');
            }
            $doctor->days()->detach();
            $doctor->delete();
        }
        return true;
    }

    public function getAllDoctors()
    {
        return $this->all();
    }

    public function adminCreate($data)
    {
        $doctor = $this->create($data);
        if (isset($data['image'])) {
            $data['image'] = $this->saveImage($data['image'], 'doctors');
            $doctor->image()->create([
                'url' => $data['image'],
            ]);
        }
        $dayIds = Day::whereIn('key', $data['days'])->pluck('id');
        $doctor->days()->attach($dayIds);
        return $doctor;
    }


    public function adminUpdate($model, $data)
    {
        $model->update($data);
        // delete from local storage
        if (isset($data['image'])) {
            if ($model->image()->exists()) {
                $this->deleteImage($model->image->url, 'doctors');
            }
            // save new image
            $data['image'] = $this->saveImage($data['image'], 'doctors');
            $model->image()->updateOrCreate([], ['url' => $data['image']]);
        }
        $dayIds = Day::whereIn('key', $data['days'])->pluck('id');
        $model->days()->sync($dayIds);
        return $model;
    }


    public function adminDelete($model)
    {
        if ($model->image()->exists()) {
            $this->deleteImage($model->image->url, 'doctors');
        }
        return $this->delete($model);
    }
}
