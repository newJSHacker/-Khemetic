<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Flag Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flag', 'Flag:') !!}
    {!! Form::text('flag', null, ['class' => 'form-control']) !!}
</div>

<!-- Abbr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abbr', 'Abbr:') !!}
    {!! Form::text('abbr', null, ['class' => 'form-control']) !!}
</div>

<!-- Script Field -->
<div class="form-group col-sm-6">
    {!! Form::label('script', 'Script:') !!}
    {!! Form::text('script', null, ['class' => 'form-control', 'readonly' => '']) !!}
</div>

<!-- Native Field -->
<div class="form-group col-sm-6">
    {!! Form::label('native', 'Native:') !!}
    {!! Form::text('native', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', false) !!}
        {!! Form::checkbox('active', '1', null) !!} &nbsp;
    </label>
</div>

<!-- Default Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default', 'Default:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('default', false) !!}
        {!! Form::checkbox('default', '1', null) !!} &nbsp;
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('languages.index') !!}" class="btn btn-default">Cancel</a>
</div>
