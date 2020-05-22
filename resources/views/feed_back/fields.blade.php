<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    <select name="user_id" id="user_id" class="form-control">
        @foreach($users as $u)
            @if(!$u->isAdmin())
                <option value="{!! $u->id !!}">{!! $u->name !!}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Page Field -->
<div class="form-group col-sm-6">
    {!! Form::label('page', 'Page:') !!}
    <select name="page" id="page" class="form-control">
        <option value="{!! Lg::ts('HOME') !!}">{!! Lg::ts('HOME') !!}</option>
        <option value="{!! Lg::ts('TRIBAL_MEMBERSHIP') !!}">{!! Lg::ts('TRIBAL_MEMBERSHIP') !!}</option>
        <option value="{!! Lg::ts('SHOP') !!}">{!! Lg::ts('SHOP') !!}</option>
        <option value="{!! Lg::ts('TRIBAL_SERVICE') !!}">{!! Lg::ts('TRIBAL_SERVICE') !!}</option>
        <option value="{!! Lg::ts('CALENDAR') !!}">{!! Lg::ts('CALENDAR') !!}</option>
        <option value="{!! Lg::ts('CONTACT_US') !!}">{!! Lg::ts('CONTACT_US') !!}</option>
        <option value="{!! Lg::ts('DONATE') !!}">{!! Lg::ts('DONATE') !!}</option>
    </select>
</div>

<!-- Subjet Field -->
<div class="form-group col-sm-12">
    {!! Form::label('subjet', 'Subjet:') !!}
    {!! Form::text('subjet', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('feedBack.index') !!}" class="btn btn-default">Cancel</a>
</div>
