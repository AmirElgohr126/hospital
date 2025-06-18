<?php

namespace App\Http\Controllers\Dashboard\Admin;


use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Repositories\Sections\SectionRepository;
use App\Http\Requests\Dashboard\Admin\SectionRequest;

class SectionController extends Controller
{

    public function __construct(private SectionRepository $sectionRepository){}

    public function index()
    {
        $sections = $this->sectionRepository->getAllSections();
        return view('dashboard.sections.index', compact('sections'));
    }

    public function store(SectionRequest $request)
    {
        $data = $request->validated();
        $this->sectionRepository->adminCreate($data);
        return redirect()->route('dashboard.admin.sections.index')->with('add', trans('dashboard.sections.add_department_success'));
    }

    public function update(SectionRequest $request, $id)
    {
        $data = $request->validated();
        $section = $this->sectionRepository->find($id);
        $this->sectionRepository->adminUpdate($section, $data);
        return redirect()->route('dashboard.admin.sections.index')->with('update', trans('dashboard.sections.update_department_success'));
    }

    public function destroy($id)
    {
        $section = $this->sectionRepository->find($id);
        $this->sectionRepository->adminDelete($section);
        return redirect()->route('dashboard.admin.sections.index')->with('delete', trans('dashboard.sections.delete_department_success'));
    }

}
