
<li class="{{ Request::is('my-feedBack*') ? 'active' : '' }}">
    <a href="{!! route('my-feedBack') !!}"><i class="fa fa-edit"></i><span>Feed Back</span></a>
</li>
@if(!auth()->user()->email_verify)
<li class="">
    <a href="#">
        <div class="alert alert-warning alert-block">
            <i class="fa fa-envelope"></i> <span>E-mail unverify</span>
        </div>
    </a>
</li>
@endif

<li class="{{ Request::is('creditCards*') ? 'active' : '' }}">
    <a href="{!! route('creditCards.index') !!}"><i class="fa fa-edit"></i><span>My Credit Cards</span></a>
</li>
