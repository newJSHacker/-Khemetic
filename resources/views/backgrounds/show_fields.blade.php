
<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{!! $background->afficher("80%") !!}</p>
</div>

<!-- Page Field -->
<div class="form-group">
    {!! Form::label('page', 'Page:') !!}
    <p>{!! $background->getPage() !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $background->created_at !!}</p>
</div>
