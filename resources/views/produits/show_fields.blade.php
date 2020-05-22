<!-- Id Field -->
<!--div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $produit->id !!}</p>
</div-->

<!-- Photo Field -->
<div class="row">
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-6">
        <!-- Prix Field -->
        <div class="form-group">
            <h3 style="color: green; font-weight: bold;"> {!! $produit->title !!}</h3>
        </div>
        
        <div class="form-group">
            {!! Form::label('photo', 'Image:') !!}
            <img src="{!! $produit->getImageLink() !!}" alt="" class="float-left"
                 style="border : 1px solid #eaeaea; max-width: 90%;">
        </div>

        <!-- Prix Field -->
        <div class="form-group">
            {!! Form::label('prix', 'Price:') !!} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span style="color: red; font-weight: bold;">$ {!! $produit->prix !!}</span>
        </div>

        <!-- Redirect Link Field -->
        <div class="form-group">
            {!! Form::label('redirect_link', 'Redirect Url:') !!}
            <a href="{!! $produit->redirect_link !!}" target="_blank">{!! $produit->redirect_link !!}</a>
        </div>

        <!-- Created At Field -->
        <!--div class="form-group">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{!! $produit->created_at !!}</p>
        </div-->

        <!-- Updated At Field -->
        <!--div class="form-group">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>{!! $produit->updated_at !!}</p>
        </div-->

        <!-- Deleted At Field -->
        <!--div class="form-group">
            {!! Form::label('deleted_at', 'Deleted At:') !!}
            <p>{!! $produit->deleted_at !!}</p>
        </div-->
    </div>
    <div class="col-md-3">&nbsp;</div>
</div>
