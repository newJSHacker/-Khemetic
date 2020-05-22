<!-- Id Field -->
<!--div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $download->id !!}</p>
</div-->

<!-- Page Field -->
<div class="form-group">
    <h3 style="color: green; font-weight: bold;">{!! $download->getPage() !!}</h3>
</div>

<!-- Page Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <h3 style="color: blue; font-weight: bold;">{!! $download->title !!}</h3>
</div>
<!-- Page Field -->
<div class="form-group">
    {!! Form::label('subtitle', 'Subtitle:') !!}
    <h3 style="color: gray; font-weight: bold;">{!! $download->subtitle !!}</h3>
</div>
<!-- Fichier Field -->
<div class="form-group">
    {!! Form::label('fichier', 'Fichier:') !!}
    <p>{!! $download->afficher("80%") !!}</p>
</div>

<!-- Auth Field -->
<div class="form-group">
    <p style="color: red; font-weight: bold;">{!! $download->getAuth() !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $download->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $download->created_at !!}</p>
</div>

<!-- Updated At Field -->
<!--div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $download->updated_at !!}</p>
</div-->

<!-- Deleted At Field -->
<!--div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $download->deleted_at !!}</p>
</div-->

