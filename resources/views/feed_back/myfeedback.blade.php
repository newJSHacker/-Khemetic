@extends('layouts.templateUser')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Feed Back</h1>

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('layouts.message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-responsive" id="feedBack-table">
                    <thead>
                    <tr>
                        <th>User</th>
                        <!--th>Subjet</th-->
                        <th>Page</th>
                        <th>Content</th>
                        <th>date</th>
                        <!--th colspan="3">Action</th-->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedBacks as $feedBack)
                        <tr>
                            <td>{!! $feedBack->user->name !!}</td>
                            <!--td>{!! $feedBack->subjet !!}</td-->
                            <td>{!! $feedBack->page !!}</td>
                            <td>{!! $feedBack->content !!}</td>
                            <td>
                                {!! $feedBack->created_at->format('M. d Y') !!} at
                                {!! $feedBack->created_at->format('H:i') !!}
                            </td>
                            <!--td>
                                {!! Form::open(['route' => ['feedBack.destroy', $feedBack->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('feedBack.show', [$feedBack->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a href="{!! route('feedBack.edit', [$feedBack->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td-->
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

