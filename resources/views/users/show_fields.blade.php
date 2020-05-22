<!-- Id Field -->
<div class="row">
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-6">
        <!-- Prix Field -->
        
        
        <div class="form-group">
            {!! Form::label('photo', 'Image:') !!} <br>
            <img src="{!! $user->getImageLink() !!}" alt="" class="float-left"
                 style="border : 1px solid #eaeaea; max-width: 90%;">
        </div>
        <!-- Name Field -->
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            <p>{!! $user->name !!}</p>
        </div>

        <!-- Email Field -->
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            <p>{!! $user->email !!}</p>
        </div>


        <!-- Created At Field -->
        <div class="form-group">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{!! $user->created_at !!}</p>
        </div>

        <!-- Updated At Field -->
        <div class="form-group">
            {!! Form::label('updated_at', 'Last Update:') !!}
            <p>{!! $user->updated_at !!}</p>
        </div>

    </div>
    <div class="col-md-3">&nbsp;</div>
</div>

