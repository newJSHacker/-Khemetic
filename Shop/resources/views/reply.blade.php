<div class="main-form mt-30">
    <h4>Leave a Reply</h4>
    <form id="form" method="post" action="{{route('re')}}">
        {{csrf_field()}}
        @foreach($com as $com)
<input type="hidden" name="icode" value="{{$com->code}}">
        <input type="hidden" name="cid" value="{{$com->id}}">
        @endforeach
        <div class="row mt-30">
            <div class="col-md-4 mb-30">
                <input type="text" name="uname" placeholder="Name" required>
            </div>
            <div class="col-md-4 mb-30">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            {{--<div class="col-md-4 mb-30">--}}
            {{--<input type="text" placeholder="Website" required>--}}
            {{--</div>--}}
            <div class="col-12 mb-30">
                <textarea cols="30" rows="3" name="umessage" placeholder="Message" required></textarea>
            </div>
            <div class="col-12 mb-30">
                <button class="btn btn-color" name="submit" id="submit" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>