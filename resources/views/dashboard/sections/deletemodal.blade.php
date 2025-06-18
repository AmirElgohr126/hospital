<div class="modal" id="deleteDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Dashboard/section.delete_department') }}</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>{{ __('Dashboard/section.confirm_delete') }}</p>
                    <input type="hidden" name="id" id="sectionId">
                    <p id="sectionName"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger" type="submit">{{ __('Dashboard/section.delete_department') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{ __('Dashboard/section.close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
