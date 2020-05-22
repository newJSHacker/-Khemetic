<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', 'Link:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>


<!-- Image Field -->
<div class="form-group col-sm-6">
    @if(isset($social))
        {!! $social->afficher("90%") !!}
    @endif
    <br>
    {!! Form::label('image', 'Image:') !!}
    <input type="file" name="image" class="form-control" {!! !isset($social) ? 'required=""' : '' !!}>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('socialmedia.index') !!}" class="btn btn-default">Cancel</a>
</div>
