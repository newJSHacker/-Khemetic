<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Card Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('card_id', 'Card Id:') !!}
    {!! Form::text('card_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Card Expire Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('card_expire_month', 'Card Expire Month:') !!}
    {!! Form::number('card_expire_month', null, ['class' => 'form-control']) !!}
</div>

<!-- Card Expire Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('card_expire_year', 'Card Expire Year:') !!}
    {!! Form::number('card_expire_year', null, ['class' => 'form-control']) !!}
</div>

<!-- Secret Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secret_code', 'Secret Code:') !!}
    {!! Form::number('secret_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('creditCards.index') !!}" class="btn btn-default">Cancel</a>
</div>
