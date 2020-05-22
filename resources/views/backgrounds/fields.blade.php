<!-- Image Field -->
<div class="form-group col-sm-6">
    @if(isset($background))
        {!! $background->afficher("90%") !!}
    @endif
    <br>
    {!! Form::label('image', 'Image:') !!}
    <input type="file" name="image" class="form-control" {!! !isset($background) ? 'required=""' : '' !!}>
</div>



<!-- Page Field -->
<div class="form-group col-sm-6">
    {!! Form::label('page', 'Page:') !!}
    <select name="page" id="page" class="form-control">
        <option value="1" {!! (isset($background) && $background->page == 1) ? 'selected' : '' !!}>Membership</option>
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backgrounds.index') !!}" class="btn btn-default">Cancel</a>
</div>
