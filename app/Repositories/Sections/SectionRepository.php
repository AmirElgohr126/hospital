<?php
namespace App\Repositories\Sections;

use App\Repositories\BaseRepository;

interface SectionRepository extends BaseRepository
{

    public function getAllSections();

    public function adminCreate($data);

    public function adminUpdate($model, $data);

    public function adminDelete($model);




}
