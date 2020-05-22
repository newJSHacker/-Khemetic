@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Media Associer
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('media_associers.show_fields')
                    <a href="{!! route('associateMedia.index') !!}" class="btn btn-default">Back</a>
                    <a href="{!! route('media.show', $mediaAssocier->media->id) !!}"
                       class="btn btn-info">Original Media</a>
                </div>
            </div>
        </div>
    </div>
@endsection
