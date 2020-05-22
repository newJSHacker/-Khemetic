@extends('layouts.app_old')


@section('css')


@endsection


@section('content')
    <section class="content-header">
        <h1 class="pull-left">Texte Site Langues</h1>
        <!--h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('texteSiteLangues.create') !!}">Add New</a>
        </h1-->
    </section>
    <section class="content-header">
        <div class="form-group col-sm-6">
            {!! Form::label('section', 'Language:') !!}
            <select name="page" id="page" class="form-control" onchange="changeLanguage(this)">
                @foreach($languages as $lang)
                    @if($lang->abbr != "en")
                    <option value="{!! $lang->abbr !!}" 
                            data-url="{!! route('texteSiteLangues.index') !!}?lang={!! $lang->abbr !!}" 
                            {!! ($lang->abbr == $current_lang->abbr) ? 'selected' : '' !!}>
                        {!! $lang->name !!}
                    </option>
                    @endif
                @endforeach
            </select>
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body scollable">
                    @include('texte_site_langues.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection





@section('scripts')
<script>
    
    $(document).ready(function() {
        $(".btn-update").click(function() {
            var id = $(this).data('id');
            var langue_id = $(this).data('lang');
            var texte = $("#text_site"+id).val();
            var url = $(this).data('url');
            var token = "{!! csrf_token() !!}";
            $.ajax({
                method: "POST",
                url: url,
                data: { _token: token, id: id, langue_id: langue_id, texte: texte },
                beforeSend: function( xhr ) {
                    $("#loader_"+id).removeClass('hidden');
                }
            })
            .done(function( data ) {
                if ( data.status != 1 ) {
                    alert('echec de la modification');
                }
            })
            .fail(function(e) {
                console.log( e );
            })
            .always(function() {
                $("#loader_"+id).addClass('hidden');
            });
        });
        
        
        
        
        
        
        
        $(".btn-new").click(function() {
            var id = $(this).data('id');
            var langue_id = $(this).data('lang');
            var texte = $("#text_site"+id).val();
            var url = $(this).data('url');
            var token = "{!! csrf_token() !!}";
            $.ajax({
                method: "POST",
                url: url,
                data: { _token: token, texte_site_id: id, langue_id: langue_id, texte: texte },
                beforeSend: function( xhr ) {
                    $("#loader_"+id).removeClass('hidden');
                }
            })
            .done(function( data ) {
                if ( data.status != 1 ) {
                    alert('echec de la modification');
                }
            })
            .fail(function(e) {
                console.log( e );
            })
            .always(function() {
                $("#loader_"+id).addClass('hidden');
            });
        });
        
        
    });
  
  
  
  
    
    function changeLanguage(select){
        var option = $(select).find(":selected");
        var url = $(option).data("url");
        document.location.href = url;
    }
    
  
</script>
  
@endsection