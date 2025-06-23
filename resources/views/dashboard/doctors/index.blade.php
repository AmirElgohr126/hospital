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
        {{-- delete selected users --}}
        <button id="deleteAllDoctors" class="btn btn-danger">
            <i class="las la-trash"></i>
            {{ __('Dashboard/doctors.deleted_doctors') }}
        </button>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
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
                                    <th class="wd-2p border-bottom-0">#</th>
                                    <th class="wd-4p border-bottom-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select_all">
                                            <label class="custom-control-label" for="select_all"></label>
                                        </div>
                                    </th>
                                    <th class="wd-13p border-bottom-0">{{ __('Dashboard/doctors.name') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('Dashboard/doctors.image') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/doctors.email') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('Dashboard/doctors.phone') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/doctors.specialization') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/doctors.bio') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('Dashboard/doctors.status') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/doctors.schedule_time') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ __('Dashboard/section.operation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="checkbox-{{ $doctor->id }}">
                                                <label class="custom-control-label"
                                                    for="checkbox-{{ $doctor->id }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ $doctor->image ? asset($doctor->image->url) : '/storage/doctors/default.jpg' }}"
                                                alt="{{ $doctor->name }}" class="img-fluid rounded-circle"
                                                style="width: 50px; height: 50px;">
                                        </td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->section->name }}</td>
                                        <td>{{ Str::limit($doctor->biography, 15) }}</td>
                                        <td>
                                            @if ($doctor->is_active == true)
                                                <span
                                                    class="badge badge-success">{{ __('Dashboard/doctors.active') }}</span>
                                            @else
                                                <span
                                                    class="badge badge-danger">{{ __('Dashboard/doctors.inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach ($doctor->days as $day)
                                                <span class="badge badge-info">{{ $day->name }}</span>
                                            @endforeach
                                            <br>
                                            {{ __('Dashboard/doctors.schedule_from') }} :
                                            {{ $doctor->schedule_from }} <br>
                                            {{ __('Dashboard/doctors.schedule_to') }} :
                                            {{ $doctor->schedule_to }}
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.admin.doctors.edit', $doctor->id) }}"
                                                class="btn btn-sm btn-info wd-90p mb-1">
                                                <i class="las la-pen"></i>
                                                {{ __('Dashboard/doctors.edit') }}
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger wd-90p" data-toggle="modal"
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
        $(document).ready(function() {
            $('#select_all').on('click', function() {
                var checked = this.checked;
                $('input[type="checkbox"]').not(this).prop('checked', checked);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#deleteAllDoctors').on('click', function() {
                var selectedIds = [];
                $('input[type="checkbox"]:checked').each(function() {
                    if ($(this).attr('id') && $(this).attr('id').startsWith('checkbox-')) {
                        selectedIds.push($(this).attr('id').replace('checkbox-', ''));
                    }
                });
                if (selectedIds.length > 0) {
                    if (!confirm('{{ __('Dashboard/doctors.confirm_delete_selected') }}')) {
                        return;
                    }
                    var form = $('<form>', {
                        'method': 'POST',
                        'action': '{{ route('dashboard.admin.doctors.deleteSelected') }}'
                    });
                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': '_token',
                        'value': '{{ csrf_token() }}'
                    }));
                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': 'doctor_ids',
                        'value': selectedIds.join(',')
                    }));
                    $('body').append(form);
                    form.submit();
                } else {
                    alert('{{ __('Dashboard/doctors.no_doctor_selected') }}');
                }
            });
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
