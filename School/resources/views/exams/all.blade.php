@extends('layouts.app')
@section('title', 'All Examinations')
@section('content')

    @php
        /*$user = \App\User::all();
        foreach ($user as $u){
            $u->password = \Hash::make("test123");
            $u->save();
        }*/

    @endphp


<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            @include('layouts.leftside-menubar')
        </div>
        <div class="col-md-10" id="main-container">
            <div class="panel panel-default">
                <div class="page-panel-title">All Examinations</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('components.exams-list',['exams'=>$exams])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
