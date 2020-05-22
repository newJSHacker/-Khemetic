@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Texte Site
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('texte_sites.show_fields')
                    <a href="{!! route('texteSites.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
