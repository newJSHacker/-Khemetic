@extends('layouts.app_old')



@section('css')

    <link href="https://fonts.googleapis.com/css?family=Milonga" rel="stylesheet">
    <style>

        .calendar-font{
            font-family: 'Milonga', cursive;
            /*width: 80%;*/
            margin-left: 10%;
        }
        .out_of_month{
            color: #eaeaea;
        }
        .in_month{
            color: #333333;
        }
        .calendar-font th{
            border: none;
            color: white;
            font-size: 25px;
            text-align: center;
        }
        .calendar-font td{
            border-top : 3px solid #fff;
            border-right : 3px solid #fff;
            border-left : 1px solid #fff;
            border-bottom : 1px solid #fff;
            height: 7.6em;
            width: 7.6em;
            vertical-align: top;
            color: white;

        }
        .calendar-font td.in_month .jour{
            width: 48%;
            color: white;
            text-align: right;
            padding-right: 10px;
            font-size: 25px;
            float: right;

        }
        .calendar-font td.in_month .date{
            width: 100%;
            color: white;
            font-size: 10px;
            text-align: right;
            padding-right: 10px;

        }
        .calendar-font td.in_month .date p{
            width: 100%;
            text-align: right !important;
            float: right;

        }
        .calendar-font td.in_month .description{
            width: 100%;
            color: white;
            font-size: 10px;
            text-align: right;
            padding-right: 10px;

        }
        .calendar-font td.in_month .description p{
            width: 100%;
            text-align: right !important;
            float: left;

        }
        .calendar-font td.in_month .image{
            width: 48%;
            color: white;
            padding-left: 10px;
            float: left;

        }
        .calendar-font td.in_month .image img{
            width: 32px;
        }
        .calendar-font td.out_of_month .jour{
            width: 100%;
            color: transparent;
        }

        .calendar-font td.out_of_month div{
            display: none;
        }
    </style>

@endsection


@section('content')

    @php
        if($month >= 0 && $month < 4){
            $bg_color = "#E7A946";
            $color = "#FFFFFF";
        }elseif($month >= 4 && $month < 8){
            $bg_color = "#77C5C5";
            $color = "#FFFFFF";
        }else //if($month >= 8 && $month < 12)
        {
            $bg_color = "#87AD56";
            $color = "#FFFFFF";
        }

    @endphp

    <section class="content-header">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="year">Select year</label>
                    <select class="form-control" id="year" name="year" onchange="changeMonth()">
                        @for($i = $year - 10; $i < $year + 10; $i++)
                            <option value="{!! $i !!}" {!! $i == $year ? "selected" : "" !!}>{!! $i !!}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="month">Select month</label>
                    <select class="form-control" id="month" name="month" onchange="changeMonth()">
                        @for($m=1; $m<=13; ++$m)
                            <option value="{!! $m !!}" {!! $m == $month ? "selected" : "" !!}>
                                {!! \App\Models\Calendar::getMonthName($m) !!}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body" style="background-color: {!! $bg_color !!}">
                    @include('calendars.calendarLIst')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection



@section('scripts')

    <script>
        $(document).ready(function() {
            $('.in_month').click(function(){
                var ladate = $(this).data('date');
                var url = $(this).data('url');
                $('#modalLabel').html(ladate);
                $('#day').val(ladate);
                $('input[name="image"]').prop('checked', false);
                $('#title').val("");
                $('#description').html("");

                $.ajax({
                    url : url,
                    type : 'POST',
                    data : { _token: "{!! csrf_token() !!}", date: ladate},
                    dataType : 'json',
                    success : function(code_html, statut){
                        //console.log(code_html);
                        var data = code_html.data;
                        if(code_html.status == 1 && data != null){
                            $('#title').val(data.title);
                            $('#description').html(data.description);
                            if(data.image != null) {
                                $("input[name='image'][value='" + data.image + "']").prop('checked', true);
                            }
                        }
                        $('#calendar-modal').modal('show');
                    },

                    error : function(resultat, statut, erreur){

                    },

                    complete : function(resultat, statut){

                    }

                });
            });


        });


        function changeMonth(){
            var month = $('#month').val();
            var year = $('#year').val();
            window.location.href = "{!! route('calendars.index') !!}?month="+month+"&year="+year;
        }

    </script>



@endsection
