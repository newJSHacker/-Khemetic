<table class="table table-responsive" id="texteSiteLangues-table">
    <thead>
        <tr>
            <th width="30%">Original Texte (en)</th>
            <th width="60%">Translate(to {!! $current_lang->abbr !!})</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @php $i=0; @endphp
    @foreach($texteSite as $ts)
        @php $class = ($i%2 == 0) ? "gris" : ""; $i++; @endphp
        <tr class="{!! $class !!}">
            <td>{!! $ts->texte !!}</td>
            <td>
                @php
                    $tsl = $ts->getLang($current_lang->id);
                    $text = $tsl != null ? $tsl->texte : '';
                @endphp
                {!! Form::textarea('texte', $text, 
                    ['class' => 'form-control', 'id'=>'text_site'.$ts->id, "rows"=>"3"]) !!}
            </td>
            <td>
                @if($tsl != null)
                    <a href="#" 
                       class='btn btn-success btn-xs btn-update'
                            data-id='{!! $ts->id !!}'
                            data-url="{!! route('texteSiteLangues.update', [$tsl->id]) !!}"
                            data-lang='{!! $current_lang->id !!}'>
                        Update &nbsp;&nbsp;
                        <i class="fa fa-spinner fa-spin hidden" id="loader_{!! $ts->id !!}"></i>
                    </a>
                @else
                    <a href="#" 
                        class='btn btn-success btn-xs btn-new'
                        data-id='{!! $ts->id !!}'
                        data-url="{!! route('texteSiteLangues.new') !!}"
                        data-lang='{!! $current_lang->id !!}'>
                         Update &nbsp;&nbsp;
                         <i class="fa fa-spinner fa-spin hidden" id="loader_{!! $ts->id !!}"></i>
                     </a>
                @endif
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>