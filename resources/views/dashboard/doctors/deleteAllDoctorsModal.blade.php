<div class="modal" id="deleteDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Dashboard/doctors.delete_doctors') }}</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>{{ __('Dashboard/doctors.confirm_delete') }}</p>
                    <input type="hidden" name="doctorIds" id="doctorIds">
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger" type="submit">{{ __('Dashboard/doctors.delete_doctors') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{ __('Dashboard/doctors.close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
