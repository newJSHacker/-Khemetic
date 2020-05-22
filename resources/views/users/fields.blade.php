@if(isset($user))
<div class="form-group">
    <img src="{!! $user->getImageLink() !!}" alt="" class="float-left"
         style="border : 1px solid #eaeaea; max-width: 80%; margin-left: 10%;">
</div>
@endif
<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Image:') !!}
    {!! Form::file('photo', null, ['class' => 'form-control', 'accept'=>'image/png, image/jpeg']) !!}
</div>
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
