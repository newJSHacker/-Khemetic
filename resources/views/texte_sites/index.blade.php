@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Texte Sites</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" 
              href="{!! route('texteSites.create') !!}">
               Add New
           </a>
        </h1>
    </section>
    <section class="content-header">
        <div class="form-group col-sm-6">
            {!! Form::label('section', 'Language:') !!}
            <select name="section" id="page" class="form-control" onchange="changeSection(this)">
                @foreach($sections as $section)
                    <option value="{!! $section !!}" 
                            data-url="{!! route('texteSites.index') !!}?section={!! $section !!}" 
                            {!! ($section == $cur_section) ? 'selected' : '' !!}>
                        {!! $section !!}
                    </option>
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
                    @include('texte_sites.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection









@section('scripts')
<script>
    
    $(document).ready(function() {
        
        
        
    });
  
  
  
  
    
    function changeSection(select){
        var option = $(select).find(":selected");
        var url = $(option).data("url");
        document.location.href = url;
    }
    
  
</script>
  
@endsection
