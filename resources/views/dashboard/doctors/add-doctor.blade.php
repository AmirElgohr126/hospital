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
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard/doctors.title') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('dashboard/doctors.add_doctor') }}</span>
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
                        {{ __('dashboard/doctors.add_doctor') }}
                    </div>
                    <p class="mg-b-20">{{ __('dashboard/doctors.add_doctor_description') }}</p>
                    <div class="pd-30 pd-sm-40 bg-gray-200">
                        <form action="{{ route('dashboard.admin.doctors.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- name --}}
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorName">{{ __('Dashboard/doctors.doctor_name') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    {{-- handle error --}}
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="doctorName" name="name"
                                        placeholder="{{ __('Dashboard/doctors.enter_doctor_name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- bio --}}
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorBio">{{ __('Dashboard/doctors.bio') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea class="form-control @error('biography') is-invalid @enderror" id="doctorBio" name="biography"
                                        placeholder="{{ __('Dashboard/doctors.enter_doctor_bio') }}"></textarea>
                                    @error('biography')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- email --}}
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorEmail">{{ __('Dashboard/doctors.email') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="doctorEmail" name="email"
                                        placeholder="{{ __('Dashboard/doctors.enter_doctor_email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- phone --}}
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorPhone">{{ __('Dashboard/doctors.phone') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="doctorPhone" name="phone"
                                        placeholder="{{ __('Dashboard/doctors.enter_doctor_phone') }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- specialization --}}
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorSpecialization">{{ __('Dashboard/doctors.enter_doctor_specialization') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control select2" id="doctorSection" name="section_id">
                                        <option value="{{ __('Dashboard/doctors.select_section') }}">
                                            {{ __('Dashboard/doctors.select_section') }}</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- days schedule --}}
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorSchedule">{{ __('Dashboard/doctors.enter_doctor_days') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control select2" id="doctorSchedule"
                                        name="days[]" multiple>
                                        @foreach ($days as $day)
                                            <option value="{{ $day->key }}">{{ $day->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            {{-- time schedule --}}
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorSchedule">{{ __('Dashboard/doctors.enter_doctor_time') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="schedule_from"
                                                class="form-label">{{ __('Dashboard/doctors.schedule_from') }}</label>
                                            <input type="time" class="form-control" id="schedule_from"
                                                name="schedule_from">
                                            @error('schedule_from')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="schedule_to"
                                                class="form-label">{{ __('Dashboard/doctors.schedule_to') }}</label>
                                            <input type="time" class="form-control" id="schedule_to"
                                                name="schedule_to">
                                            @error('schedule_to')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorImage">{{ __('Dashboard/doctors.enter_doctor_image') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="file" class="dropify" data-height="200" name="image"
                                        id="doctorImage" />
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- status --}}
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0"
                                        for="doctorStatus">{{ __('Dashboard/doctors.status') }}</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="form-control" id="doctorStatus" name="status">
                                        <option value="">{{ __('Dashboard/doctors.select_status') }}</option>
                                        <option value="active">{{ __('Dashboard/doctors.active') }}</option>
                                        <option value="inactive">{{ __('Dashboard/doctors.inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row row-xs align-items-center">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">
                                        {{ __('Dashboard/doctors.add_doctor') }}
                                    </button>
                                    <button class="btn btn-dark pd-x-30 mg-t-5" type="button" data-dismiss="modal">
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

    {{-- validation form & to time --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scheduleFrom = document.getElementById('schedule_from');
            const scheduleTo = document.getElementById('schedule_to');

            scheduleFrom.addEventListener('change', function() {
                if (scheduleTo.value && scheduleFrom.value > scheduleTo.value) {
                    alert('{{ __('Dashboard/doctors.schedule_from_error') }}');
                    scheduleFrom.value = '';
                }
            });

            scheduleTo.addEventListener('change', function() {
                if (scheduleFrom.value && scheduleTo.value < scheduleFrom.value) {
                    alert('{{ __('Dashboard/doctors.schedule_to_error') }}');
                    scheduleTo.value = '';
                }
            });
        });
    </script>
@endsection
