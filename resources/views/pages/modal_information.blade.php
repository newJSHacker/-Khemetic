<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">{!! Lg::ts('user_info_pleasefield') !!}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formparam" action="{!! route('contactAdresses.store') !!}" method="post">
                @csrf 
                <input type="hidden" name="from_view" value="1">
                <input type="hidden" id="downdload-field" name="download" value="{!! isset($downloads) ? $downloads[0]->id : 0 !!}">
                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">{!! Lg::ts('user_info_Email_address') !!}</label>
                        <input type="email" required="" class="form-control" name="email" placeholder="{!! Lg::ts('user_info_Enter_your_email') !!}l">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="prenom">{!! Lg::ts('user_info_first_name') !!}</label>
                                <input type="prenom" class="form-control" name="prenom" placeholder="{!! Lg::ts('user_info_your_first_name') !!}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nom">{!! Lg::ts('user_info_Last_name') !!}</label>
                                <input type="nom" required="" class="form-control" name="nom" placeholder="{!! Lg::ts('user_info_your_Last_name') !!}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tel">{!! Lg::ts('user_info_Phone') !!}</label>
                        <input type="tel" required="" class="form-control" name="tel" placeholder="{!! Lg::ts('user_info_your_phone_number') !!}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{!! Lg::ts('user_info_Close') !!}</button>
                    <button type="submit" id="submit" class="btn btn-success">{!! Lg::ts('user_info_Save_and_download') !!}</button>
                </div>
            </form>
        </div>
    </div>
</div>
