<!-- Section Field -->
<div class="form-group col-sm-6">
    {!! Form::label('section', 'Section:') !!}
    {!! Form::text('section', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    @php
        $attr = isset($texteSite) ? 'readonly' : '';
    @endphp
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control', $attr => '']) !!}
</div>

<!-- Texte Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('texte', 'Texte:') !!}
    {!! Form::textarea('texte', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('texteSites.index') !!}" class="btn btn-default">Cancel</a>
</div>
