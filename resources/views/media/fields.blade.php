<style>
    .bloc_add_new_m{
        border: 1px solid #dfdfdf;
        background-color: rgba(160, 206, 255, 0.29);
        padding: 15px;
        margin: 15px 20px;
        width: 96%;
    }
</style>

<!-- Categorie Id Field -->
<div class="col-sm-6">
    <div class="form-group">
        {!! Form::label('categorie_id', 'Categorie Id:') !!}
        <select name="categorie_id" id="categorie_id" class="form-control select2"
            data-placeholder="select catégorie">
            @php $i = 0; @endphp
            @foreach($categories as $categorie)
                <option value="{!! $categorie->id !!}"
                    {!! ((isset($media) && $categorie->id == $media->categorie_id) || $i == 0) ? 'selected' : '' !!}
                >{!! $categorie->nom !!}</option>
                @php $i++; @endphp
            @endforeach
        </select>
    </div>
</div>

<!-- Name Field -->
<div class="col-sm-6">
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Fichier Field -->

<!-- Image Field -->
<!--div class="col-sm-6">
    <div class="form-group">
        @if(isset($media))
            {!! $media->afficher("90%") !!}
        @endif
        <br>
        {!! Form::label('fichier', 'Shose Media:') !!}
        <input type="file" name="fichier" class="form-control">
    </div>
</div-->


<!-- Image Field -->
<div class="col-sm-6">
    <div class="form-group">
        @if(isset($media))
            {!! $media->afficherImage("90%") !!}
        @endif
        <br>
        {!! Form::label('image', 'Shose image that représent this media:') !!}
        <input type="file" name="image" class="form-control" {!! !isset($media) ? 'required=""' : '' !!}>
    </div>
</div>



<div id="add_relieted_media"></div>

<!-- Image Field -->
<div class="form-group col-sm-12">
    <hr style="margin: 15px 0px; border-bottom: 1px solid #f7f4f4">
</div>


<div class="form-group col-sm-12">
    <p>
        Add relieted media like PDF version or mp3 format, text format, audio format and video format.
        <br>
        <u><b>Note</b></u> : <i>the file format will be detected automatically via the file extension, so make sure your file has the correct extension</i>
    </p>
    <button class="btn btn-warning" type="button" id="to_add_associete_media">Add relieted Media</button>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('media.index') !!}" class="btn btn-default">Cancel</a>
</div>




<div id="model_form_media_associer" style="display: none;">


    <div class="col-sm-12 bloc_add_new_m">
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name_associer', 'Name:') !!}
            {!! Form::text('name_associer[]', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Fichier Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('fichier_associer', 'Shose Relieted Media :') !!}
            <input type="file" name="fichier_associer[]" class="form-control">

        </div>
    </div>



</div>
