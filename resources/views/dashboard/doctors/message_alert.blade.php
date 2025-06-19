@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            <strong>{{ __('Dashboard/doctors.error') }}</strong>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
@if (session()->has('add'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('Dashboard/doctors.doctor_created_successfully') }}",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('update'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('Dashboard/doctors.doctor_updated_successfully') }}",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('Dashboard/doctors.doctor_deleted_successfully') }}",
                type: "error"
            });
        }
    </script>
@endif
