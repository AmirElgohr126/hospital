@extends('dashboard.layouts.master')

@section('css')
<link href="{{ URL::asset('assets/dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/dashboard/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet"
    type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/dashboard/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{ URL::asset('assets/dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{ URL::asset('assets/dashboard/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard/doctors.title') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('dashboard/doctors.edit_doctor') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{ __('dashboard/doctors.edit_doctor') }}
                    </div>
                    <p class="mg-b-20">{{ __('dashboard/doctors.edit_doctor_description') }}</p>
                    <div class="pd-30 pd-sm-40 bg-gray-200">
                        <form id="doctorForm" action="{{ route('dashboard.admin.doctors.update', $doctor->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Name -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorName">{{ __('Dashboard/doctors.doctor_name') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="doctorName" name="name" value="{{ old('name', $doctor->name) }}"
                                        placeholder="{{ __('Dashboard/doctors.enter_doctor_name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Bio -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorBio">{{ __('Dashboard/doctors.bio') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea class="form-control @error('biography') is-invalid @enderror" id="doctorBio" name="biography"
                                        placeholder="{{ __('Dashboard/doctors.enter_doctor_bio') }}" rows="4">{{ old('biography', $doctor->biography) }}</textarea>
                                    @error('biography')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorEmail">{{ __('Dashboard/doctors.email') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="doctorEmail" name="email" value="{{ old('email', $doctor->email) }}"
                                        placeholder="{{ __('Dashboard/doctors.enter_doctor_email') }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Phone -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorPhone">{{ __('Dashboard/doctors.phone') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                        id="doctorPhone" name="phone" value="{{ old('phone', $doctor->phone) }}"
                                        placeholder="{{ __('Dashboard/doctors.enter_doctor_phone') }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Specialization -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorSection">{{ __('Dashboard/doctors.enter_doctor_specialization') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control select2 @error('section_id') is-invalid @enderror"
                                        id="doctorSection" name="section_id" required>
                                        <option value="">{{ __('Dashboard/doctors.select_section') }}</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}"
                                                {{ old('section_id', $doctor->section_id) == $section->id ? 'selected' : '' }}>
                                                {{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Days Schedule -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorSchedule">{{ __('Dashboard/doctors.enter_doctor_days') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control select2 @error('days') is-invalid @enderror"
                                        id="doctorSchedule" name="days[]" multiple required>
                                        @foreach ($days as $day)
                                            <option value="{{ $day->key }}"
                                                {{ in_array($day->key, old('days', $doctor->days->pluck('key')->toArray())) ? 'selected' : '' }}>
                                                {{ $day->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Time Schedule -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label
                                        class="form-label mg-b-0">{{ __('Dashboard/doctors.enter_doctor_time') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="schedule_from"
                                                class="form-label">{{ __('Dashboard/doctors.schedule_from') }}</label>
                                            <input type="time"
                                                class="form-control @error('schedule_from') is-invalid @enderror"
                                                id="schedule_from" name="schedule_from"
                                                value="{{ old('schedule_from', $doctor->schedule_from) }}" required>
                                            @error('schedule_from')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="schedule_to"
                                                class="form-label">{{ __('Dashboard/doctors.schedule_to') }}</label>
                                            <input type="time"
                                                class="form-control @error('schedule_to') is-invalid @enderror"
                                                id="schedule_to" name="schedule_to"
                                                value="{{ old('schedule_to', $doctor->schedule_to) }}" required>
                                            @error('schedule_to')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Image -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0" for="doctorImage">
                                        {{ __('Dashboard/doctors.enter_doctor_image') }}
                                    </label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="file" class="dropify @error('image') is-invalid @enderror"
                                        data-height="200" name="image" id="doctorImage" accept="image/*"
                                        data-default-file="{{ $doctor->image->url ? asset($doctor->image->url) : '' }}" />
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Status -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorStatus">{{ __('Dashboard/doctors.status') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control @error('status') is-invalid @enderror" id="doctorStatus"
                                        name="status" required>
                                        <option value="">{{ __('Dashboard/doctors.select_status') }}</option>
                                        <option value="active" {{ old('status', $doctor->status) == 'active' ? 'selected' : '' }}>
                                            {{ __('Dashboard/doctors.active') }}</option>
                                        <option value="inactive" {{ old('status', $doctor->status) == 'inactive' ? 'selected' : '' }}>
                                            {{ __('Dashboard/doctors.inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Buttons -->
                            <div class="row row-xs align-items-center">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">
                                        {{ __('Dashboard/doctors.update_doctor') }}
                                    </button>
                                    <button class="btn btn-dark pd-x-30 mg-t-5" type="button"
                                        onclick="window.history.back()">
                                        {{ __('Dashboard/doctors.close') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!--Internal  Select2 js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Form-layouts js -->
    <script src="{{ URL::asset('assets/dashboard/js/form-layouts.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/fancyuploder/fancy-uploader.js') }}"></script>


@endsection
