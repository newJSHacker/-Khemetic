<style>
    h2{
        font-size: 18px;
        text-align: center;
    }
    h1 label{
        font-size: 18px;
    }
</style>

<div class="row">

    <div class="col-lg-3 col-md-1 col-xs-12 float-left">
        &nbsp;
    </div>

    <div class="col-lg-6 col-md-10 col-xs-12 float-left">
        <br><br>
        <hr>
        @if(auth()->check())
        {!! Form::open(['route' => 'feedBack.store']) !!}

            <input type="hidden" name="user_id" value="{!! auth()->check() ? auth()->user()->id : 0 !!}">
            <input type="hidden" name="page" value="{!! $page_feedback ? $page_feedback : "all" !!}">
            <input type="hidden" name="from" value="user">
            <input type="hidden" name="subjet" value="{!! $page_feedback ? "User feedback form page ".$page_feedback : "User feedback for page "."all" !!}">


            <!-- Content Field -->
            <div class="form-group col-sm-12 col-lg-12">
                <h1>{!! Form::label('content', 'Live your feedback here :') !!}</h1>
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
            </div>


        {!! Form::close() !!}
        @else
            <h2><a href="{!! route('login') !!}">Login</a> to live your feedback</h2>

        @endif
    </div>

    <div class="col-lg-3 col-md-1 col-xs-12 float-left">
        &nbsp;
    </div>

</div>
