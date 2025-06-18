<?php

namespace App\Repositories\Sections\Eloquent;

use App\Repositories\EloquentBaseRepository;
use App\Repositories\Sections\SectionRepository;

class EloquentSectionRepository extends EloquentBaseRepository implements SectionRepository
{

    public function getAllSections()
    {
        return $this->model->all();
    }


    public function adminCreate($data)
    {
        return $this->model->create($data);
    }



    public function adminUpdate($model, $data)
    {

        return $this->update($model, $data);
    }


    public function adminDelete($model)
    {
        return $this->delete($model);
    }
}
