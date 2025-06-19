<div class="modal" id="updateDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Dashboard/doctors.update_Doctor') }}</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="" method="POST" accept="image/*" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="doctorName">{{ __('Dashboard/doctors.doctor_name') }}</label>
                        <input type="text" class="form-control" id="doctorName" name="name"
                            placeholder="{{ __('Dashboard/doctors.update_doctor_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="doctorEmail">{{ __('Dashboard/doctors.email') }}</label>
                        <input type="email" class="form-control" id="doctorEmail" name="email"
                            placeholder="{{ __('Dashboard/doctors.update_doctor_email') }}">
                    </div>
                    <div class="form-group">
                        <label for="doctorPhone">{{ __('Dashboard/doctors.phone') }}</label>
                        <input type="text" class="form-control" id="doctorPhone" name="phone"
                            placeholder="{{ __('Dashboard/doctors.update_doctor_phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="doctorSpecialization">{{ __('Dashboard/doctors.specialization') }}</label>
                        <input type="text" class="form-control" id="doctorSpecialization" name="specialization"
                            placeholder="{{ __('Dashboard/doctors.update_doctor_specialization') }}">
                    </div>
                    <div class="form-group">
                        <label for="doctorBio">{{ __('Dashboard/doctors.bio') }}</label>
                        <textarea class="form-control" id="doctorBio" name="biography"
                            placeholder="{{ __('Dashboard/doctors.update_doctor_bio') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="doctorSchedule">{{ __('Dashboard/doctors.appointment_schedule') }}</label>
                        <input type="text" class="form-control" id="appointment_schedule" name="appointment_schedule"
                            placeholder="{{ __('Dashboard/doctors.update_doctor_schedule') }}">
                    </div>
                    {{-- view image if exists --}}
                    <div class="form-group">
                        <label for="doctorImage">{{ __('Dashboard/doctors.image') }}</label>
                        <input type="file" class="form-control" id="doctorImage" name="profile_picture"
                            accept="image/*">
                        <small class="form-text text-muted">{{ __('Dashboard/doctors.update_doctor_image') }}</small>
                        <img id="currentDoctorImage" src="" alt="Current Doctor Image" class="img-thumbnail mt-2"
                            style="max-width: 200px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary"
                        type="submit">{{ __('Dashboard/doctors.update_Doctor') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                        type="button">{{ __('Dashboard/doctors.close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
