<div class="modal fade" id="ModalPhoneContact" tabindex="-1" role="dialog" aria-labelledby="ModalPhoneContactLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="ModalPhoneContactLabel">{!! Lg::ts('user_info_phone') !!}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-phone" action="{!! route('send-call-phone') !!}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="tel">{!! Lg::ts('user_info_Phone') !!}</label>
                        <input type="tel" required="" class="form-control inputmask" name="tel" placeholder="_-___-___-____">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{!! Lg::ts('user_info_Close') !!}</button>
                    <button type="submit" id="submit" class="btn btn-success">{!! Lg::ts('phone_save') !!}</button>
                </div>
            </form>
        </div>
    </div>
</div>
