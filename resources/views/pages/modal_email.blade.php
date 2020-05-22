<div class="modal fade" id="ModalEmailContact" tabindex="-1" role="dialog" aria-labelledby="ModalEmailContactLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="ModalEmailContactLabel">{!! Lg::ts('user_info_pleasefield') !!}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-email" action="#" method="post">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">{!! Lg::ts('user_info_Email_address') !!}</label>
                        <input type="email" required="" class="form-control" name="email" placeholder="{!! Lg::ts('user_info_Enter_your_email') !!}l">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{!! Lg::ts('user_info_Close') !!}</button>
                    <button type="submit" id="submit" class="btn btn-success">{!! Lg::ts('save') !!}</button>
                </div>
            </form>
        </div>
    </div>
</div>
