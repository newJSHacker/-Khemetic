<table class="table table-responsive" id="creditCards-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Card Id</th>
        <th>Card Expire Month</th>
        <th>Card Expire Year</th>
        <th>Secret Code</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($creditCards as $creditCard)
        <tr>
            <td>{!! $creditCard->user_id !!}</td>
            <td>{!! $creditCard->card_id !!}</td>
            <td>{!! $creditCard->card_expire_month !!}</td>
            <td>{!! $creditCard->card_expire_year !!}</td>
            <td>{!! $creditCard->secret_code !!}</td>
            <td>
                {!! Form::open(['route' => ['creditCards.destroy', $creditCard->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('creditCards.show', [$creditCard->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('creditCards.edit', [$creditCard->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>