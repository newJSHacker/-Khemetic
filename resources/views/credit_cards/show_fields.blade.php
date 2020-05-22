<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $creditCard->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $creditCard->user_id !!}</p>
</div>

<!-- Card Id Field -->
<div class="form-group">
    {!! Form::label('card_id', 'Card Id:') !!}
    <p>{!! $creditCard->card_id !!}</p>
</div>

<!-- Card Expire Month Field -->
<div class="form-group">
    {!! Form::label('card_expire_month', 'Card Expire Month:') !!}
    <p>{!! $creditCard->card_expire_month !!}</p>
</div>

<!-- Card Expire Year Field -->
<div class="form-group">
    {!! Form::label('card_expire_year', 'Card Expire Year:') !!}
    <p>{!! $creditCard->card_expire_year !!}</p>
</div>

<!-- Secret Code Field -->
<div class="form-group">
    {!! Form::label('secret_code', 'Secret Code:') !!}
    <p>{!! $creditCard->secret_code !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $creditCard->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $creditCard->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $creditCard->deleted_at !!}</p>
</div>

