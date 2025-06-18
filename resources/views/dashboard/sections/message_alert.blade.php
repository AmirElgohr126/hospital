@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            <strong>{{ __('Dashboard/section.error') }}</strong>
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
                msg: "{{ trans('Dashboard/section.add_department_success') }}",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('update'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('Dashboard/section.edit_department_success') }}",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ trans('Dashboard/section.delete_department_success') }}",
                type: "error"
            });
        }
    </script>
@endif
