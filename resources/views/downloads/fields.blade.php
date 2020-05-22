<!-- Page Field -->
<!-- Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<!-- Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtitle', 'Subtitle:') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('page', 'This download is for page :') !!}
    <select name="page" id="page" class="form-control">
        <option value="1" {!! (isset($download) && $download->page == 1) ? 'selected' : '' !!}>Membership</option>
        <option value="2" {!! (isset($download) && $download->page == 2) ? 'selected' : '' !!}>Tribal services</option>
    </select>
</div>

<!-- Fichier Field -->
<div class="form-group col-sm-6">
    @if(isset($download))
        {!! $download->afficher("90%") !!}
    @endif
    <br>
    {!! Form::label('fichier', 'Fichier:') !!}
    <input type="file" name="fichier" class="form-control" {!! !isset($download) ? 'required=""' : '' !!}>
</div>

<!-- Auth Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('auth', 'Leave the settings before downloading:') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('auth', '1', null) !!} &nbsp;
    </label>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('downloads.index') !!}" class="btn btn-default">Cancel</a>
</div>
