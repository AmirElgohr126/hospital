<div class="modal" id="updateDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="addDepartmentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Dashboard/section.update_department') }}</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="departmentName">{{ __('Dashboard/section.department_name') }}</label>
                        <input type="text" class="form-control" id="departmentName" name="name"
                            placeholder="{{ __('Dashboard/section.enter_department_name') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary"
                        type="submit">{{ __('Dashboard/section.update_department') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                        type="button">{{ __('Dashboard/section.close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
