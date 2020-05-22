<!-- Langue Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('langue_id', 'Langue Id:') !!}
    {!! Form::number('langue_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Texte Site Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('texte_site_id', 'Texte Site Id:') !!}
    {!! Form::number('texte_site_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Section Field -->
<div class="form-group col-sm-6">
    {!! Form::label('section', 'Section:') !!}
    {!! Form::text('section', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Texte Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('texte', 'Texte:') !!}
    {!! Form::textarea('texte', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('texteSiteLangues.index') !!}" class="btn btn-default">Cancel</a>
</div>
