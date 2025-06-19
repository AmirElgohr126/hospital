@extends('dashboard.layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/prism/prism.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/dashboard/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!---Internal  Notify -->
    <link href="{{ URL::asset('assets/dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('Dashboard/doctors.title') }}/</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">{{ __('Dashboard/doctors.all_doctors') }}</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button class="btn btn-primary" data-toggle="modal"
                    data-target="#addDoctorModal">{{ __('Dashboard/doctors.create') }}</button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                        data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    @include('dashboard.doctors.addmodal')
    @include('dashboard.doctors.updatemodal')
    @include('dashboard.doctors.deletemodal')
    @include('dashboard.doctors.message_alert')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-3p border-bottom-0">#</th>
                                    <th class="wd-13p border-bottom-0">{{ __('Dashboard/doctors.name') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/doctors.email') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('Dashboard/doctors.phone') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/doctors.specialization') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/doctors.bio') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/doctors.appointment_schedule') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ __('Dashboard/section.operation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->specialization }}</td>
                                        <td>{{ $doctor->biography }}</td>
                                        <td>{{ $doctor->appointment_schedule }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#updateDoctorModal"
                                                data-id="{{ $doctor->id }}"
                                                data-name="{{ $doctor->name }}"
                                                data-email="{{ $doctor->email }}"
                                                data-phone="{{ $doctor->phone }}"
                                                data-specialization="{{ $doctor->specialization }}"
                                                data-biography="{{ $doctor->biography }}"
                                                data-appointment_schedule="{{ $doctor->appointment_schedule }}"
                                                data-image="{{ $doctor->profile_picture }}">
                                                <i class="las la-pen"></i>
                                                {{ __('Dashboard/doctors.edit') }}
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#deleteDoctorModal" data-id="{{ $doctor->id }}"
                                                data-name="{{ $doctor->name }}">
                                                <i class="las la-trash"></i>
                                                {{ __('Dashboard/doctors.delete') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/dashboard/js/table-data.js') }}"></script>
    {{-- modal script --}}
    <script src="{{ URL::asset('assets/dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/dashboard/js/modal.js') }}"></script>
    {{-- notification script --}}
    <script src="{{ URL::asset('assets/dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
    <script>
        $('#updateDoctorModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var email = button.data('email');
            var phone = button.data('phone');
            var specialization = button.data('specialization');
            var biography = button.data('biography');
            var appointment_schedule = button.data('appointment_schedule');
            var image = button.data('image');
            // If image exists, set the src attribute
            var currentImage = $('#currentDoctorImage');
            if (image) {
                path = '{{ env('APP_URL') . '/hospital/public/' }}';
                currentImage.attr('src', path + image).show();
            } else {
                currentImage.hide();
            }
            // Set the form action and input values
            var modal = $(this);
            modal.find('form').attr('action', '{{ route('dashboard.admin.doctors.update', '') }}/' + id);
            modal.find('#doctorName').val(name);
            modal.find('#doctorEmail').val(email);
            modal.find('#doctorPhone').val(phone);
            modal.find('#doctorSpecialization').val(specialization);
            modal.find('#doctorBio').val(biography);
            modal.find('#appointment_schedule').val(appointment_schedule);
        });
    </script>

    <script>
        $(document).on('change', '#doctorImage', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#currentDoctorImage').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#currentDoctorImage').hide();
            }
        });
    </script>


    <script>
        $('#deleteDoctorModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var modal = $(this);
            modal.find('form').attr('action', '{{ route('dashboard.admin.doctors.destroy', '') }}/' + id);
            modal.find('#doctorId').val(id);
            modal.find('#doctorName').text(name);
        });
    </script>
@endsection
