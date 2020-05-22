<style>
    .form-control {
        width: 100%;
        margin-bottom: 20px;
        padding: 7px 30px;
        font-size: 14px;
        border-radius: 10px;
        border: 1px solid #00000047 !important;
        background: #ffffff !important;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        transition: all .3s;
    }
</style>

<div class='add_comment_area'>
    <h5 class='text-center'>{!! Lg::ts('Add_a_comment') !!}</h5>
    <form method='post' action='{{route("blogetc.comments.add_new_comment", $post->slug)}}'>
        @csrf


        <div class="form-group ">

            <label id="comment_label" for="comment">{!! Lg::ts('Your_Comment') !!} </label>
                    <textarea
                            class="form-control"
                            name='comment'
                            required
                            id="comment"
                            placeholder="{!! Lg::ts('Write_your_comment_here') !!}"
                            rows="7">{{old("comment")}}</textarea>


        </div>

        <div class='container-fluid'>
            <div class='row'>

                @if(config("blogetc.comments.save_user_id_if_logged_in", true) == false || !\Auth::check())

                    <div class='col-sm-12 col-md-4 float-left'>
                        <div class="form-group ">
                            <label id="author_name_label" for="author_name">{!! Lg::ts('Your_Name') !!} </label>
                            <input
                                    type='text'
                                    class="form-control"
                                    name='author_name'
                                    id="author_name"
                                    placeholder="{!! Lg::ts('Your_Name') !!}"
                                    required
                                    value="{{old("author_name")}}">
                        </div>
                    </div>

                    @if(config("blogetc.comments.ask_for_author_email"))
                        <div class='col-sm-12 col-md-4 float-left'>
                            <div class="form-group">
                                <label id="author_email_label" for="author_email">{!! Lg::ts('Your_Email') !!}
                                    <small>(won't be displayed publicly)</small>
                                </label>
                                <input
                                        type='email'
                                        class="form-control"
                                        name='author_email'
                                        id="author_email"
                                        placeholder="{!! Lg::ts('Your_Email') !!}"
                                        required
                                        value="{{old("author_email")}}">
                            </div>
                        </div>
                    @endif
                @endif


                @if(config("blogetc.comments.ask_for_author_website"))
                    <div class='col-sm-12 col-md-4 float-left'>
                        <div class="form-group">
                            <label id="author_website_label" for="author_website">{!! Lg::ts('Your_Website') !!}
                                <small>({!! Lg::ts('Will_be_displayed') !!})</small>
                            </label>
                            <input
                                    type='url'
                                    class="form-control"
                                    name='author_website'
                                    id="author_website"
                                    placeholder="{!! Lg::ts('Your_Website_URL') !!}"
                                    value="{{old("author_website")}}">
                        </div>
                    </div>

                @endif
            </div>
        </div>


        @if($captcha)
            {{--Captcha is enabled. Load the type class, and then include the view as defined in the captcha class --}}
            @include($captcha->view())
        @endif


        <div class="form-group ">
            <input type='submit' class="btn btn-success "
                   value='{!! Lg::ts('Add_Comment') !!}'>
        </div>

    </form>
</div>

<div style="margin-top: 120px;">&nbsp;</div>