<!-- Photo Field -->
@if(isset($produit))
<div class="form-group">
    <img src="{!! $produit->getImageLink() !!}" alt="" class="float-left"
         style="border : 1px solid #eaeaea; max-width: 80%; margin-left: 10%;">
</div>
@endif
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Image:') !!}
    {!! Form::file('photo', null, ['class' => 'form-control', 'accept'=>'image/png, image/jpeg']) !!}
</div>

<!-- Prix Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix', 'Price:') !!}
    {!! Form::number('prix', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Redirect Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('redirect_link', 'Redirect Url:') !!}
    {!! Form::text('redirect_link', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('produits.index') !!}" class="btn btn-default">Cancel</a>
</div>
