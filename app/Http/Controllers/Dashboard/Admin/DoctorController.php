<?php

namespace App\Http\Controllers\Dashboard\Admin;
use App\Models\Day;
use App\Repositories\Sections\SectionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Doctors\DoctorRepository;
use App\Http\Requests\Dashboard\Doctor\DoctorRequest;
use App\Http\Requests\Dashboard\Doctor\UpdateDoctorRequest;

class DoctorController extends Controller
{
    public function __construct(private DoctorRepository $doctorRepository,private SectionRepository $sectionRepository)
    {
    }

    public function index()
    {
        // return view('dashboard.doctors.index', ['doctors' => $this->doctorRepository->getAllPaginatedDoctors()]);
        return view('dashboard.doctors.index', ['doctors' => $this->doctorRepository->getAllDoctors()]);
    }


    public function show($id)
    {
        return view('dashboard.doctors.show', ['doctor' => $this->doctorRepository->find($id)]);
    }


    public function create()
    {
        $sections = $this->sectionRepository->getAllSections();
        $days = Day::all();
        return view('dashboard.doctors.add-doctor', compact('sections', 'days'));
    }


    public function store(DoctorRequest $request)
    {
        $data = $request->validated();
        $this->doctorRepository->adminCreate($data);
        session()->flash('add', __('Dashboard/doctors.doctor_created_successfully'));
        return redirect()->route('dashboard.admin.doctors.index');
    }

    public function edit($id)
    {
        $doctor = $this->doctorRepository->find($id);
        $sections = $this->sectionRepository->getAllSections();
        $days = Day::all();
        return view('dashboard.doctors.edit-doctor', compact('doctor', 'sections', 'days'));
    }


    public function update(UpdateDoctorRequest $request, $id)
    {
        $data = $request->validated();
        $doctor = $this->doctorRepository->find($id);
        $this->doctorRepository->adminUpdate($doctor, $data);
        session()->flash('update', __('Dashboard/doctors.doctor_updated_successfully'));
        return redirect()->route('dashboard.admin.doctors.index');
    }


    public function destroy(Request $request, $id)
    {
        $doctor = $this->doctorRepository->find($id);
        $this->doctorRepository->adminDelete($doctor);
        session()->flash('delete', __('Dashboard/doctors.doctor_deleted_successfully'));
        return redirect()->route('dashboard.admin.doctors.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        return view('doctors.search', ['query' => $query]);
    }

}
