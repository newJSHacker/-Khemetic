@extends('layouts.app')

@section('title')
    Tribal services - {!! config('app.name') !!}

    @php

        if($month == 12 || $month == 13 || $month == 1 || $month == 2){
            $bg_color = "#87AD56"; //vert
            $color = "#FFFFFF";
        }elseif($month == 3 || $month == 4 || $month == 5 || $month == 6){
            $bg_color = "#E7A946"; //orange
            $color = "#FFFFFF";
        }elseif($month == 7){
            $bg_color = "#C0C0C0"; //gris
            $color = "#FFFFFF";
        }elseif($month == 8 || $month == 9 || $month == 10 || $month == 11){
            $bg_color = "#77C5C5"; //bleu
            $color = "#FFFFFF";
        }

        $first_day = $premier_jour; //date($year.'-'.sprintf("%02d", $month).'-01');
        if($month == 7){
            $nb_Jours = 4; //date("t", mktime(0, 0, 0, $month, 1, $year));
        }else{
            $nb_Jours = 29;
        }
        $date_aa = new DateTime($first_day.' 00:00:00');
        if($month == 7){
            $date_aa->modify("+4 day"); //$nb_Jours = 4; //date("t", mktime(0, 0, 0, $month, 1, $year));
        }else{
            $date_aa->modify("+29 day"); //$nb_Jours = 29;
        }

        $last_day = $date_aa->format('Y-m-d'); //date('Y-m-d',  mktime(0, 0, 0, $month, $nb_Jours, $year));
        $last_one = $date_aa->format('Y-m-d'); //date('Y-m-d',  mktime(0, 0, 0, $month, $nb_Jours, $year));

        $dayofweek = date('w', strtotime($first_day));

        if($dayofweek != 1){
            $prev_monday = date('Y-m-d', strtotime('previous monday', strtotime($first_day)));
        }else{
            $prev_monday = "".$first_day;
        }


        if(date('w', strtotime($last_day)) != 0){
            $last_day = date('Y-m-d', strtotime('next sunday', strtotime($last_day)));
        }

        if($month == 7){
            $date_aa->modify("+25 day");
            $last_day = $date_aa->format('Y-m-d');
        }

        $date_aa = new DateTime($last_day.' 00:00:00');

        if($month == 2){
            $dj = date("t", mktime(0, 0, 0, $month, 1, $year));
            $ljs = date('w', strtotime(date('Y-m-d',  mktime(0, 0, 0, $month, $nb_Jours, $year))));
            if($ljs == 6 || $ljs == 0 ){
                if($dj == 28)
                    $date_aa->modify('+2 day');
                else
                    $date_aa->modify('+1 day');
                $last_day = date('Y-m-d', strtotime('next sunday', strtotime($last_day)));
            }

        }


    @endphp

@endsection

@section('bg_class')
    bg_standard
@endsection

@section('slide')


    <div id="carousel-area" class="header-slide">
        <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">


        </div>
    </div>

@endsection



@section('css')

    @php
        $img = ($month * 1 == 7) ? 0 : (($month * 1 > 7) ? ($month * 1) - 1 : $month * 1);

    @endphp

    <style>
        .msg-btn:hover{
            cursor: default !important;
        }


    </style>



    <link href="https://fonts.googleapis.com/css?family=Milonga" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <style>

        .oxygene-font{
            font-family: 'Oxygen', sans-serif;
        }
        .calendar-font{
            font-family: 'Milonga', cursive;
            /*width: 80%;
            margin-left: 10%;*/
        }
        .calendar-font{
            font-family: 'Milonga', cursive;
            /*width: 80%;
            margin-left: 10%;*/
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
            color: white;
            font-size: 10px;
            line-height: 1;

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
            font-size: 10px;
            color: white;
            line-height: 1;

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

        .masthead {
            height: 100vh;
            min-height: 500px;
            background-image: url('{!! asset('img/calendar/egypt'.($img).'.png') !!}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .y_0, .y_1, .y_2, .y_3{
            color: white;
            letter-spacing: 0px;
        }
        .y_0{
            font-size: 3em !important;

        }
        .y_1{
            font-size: 6em !important;
            margin-left: -0.25em;
        }
        .y_2{
            font-size: 3em !important;
            margin-left: -0.5em;
        }
        .y_3{
            font-size: 3em !important;
            margin-left: -0.25em;
        }
        .year-title{
            margin-top: -10.5%;
            margin-left: 20%;
            width: 57.2%;
        }
        .month-name{
            color: white;
            margin-left: -12%;
            font-size: 4em;

        }
        .month-name_l{
            color: white;
            font-size: 2em;
            float: left;
        }
        .month-name_r{
            color: white;
            font-size: 2em;
            float: right;
        }

        .title-blog{
            font-size: 1.5em !important;
            color: #3e3e3e;
            margin-bottom: 25px;
        }

    </style>


    <style>


        @media(max-width:768px){
            .calendar-font{
                font-family: 'Milonga', cursive;
                width: 100% !important;
                /*margin-left: 10%;*/
            }

            .calendar-font th{
                border: none;
                color: white;
                font-size: 1em;
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
                font-size: 1em;
                float: right;

            }
            .calendar-font td.in_month .date p{
                width: 100%;
                text-align: right !important;
                float: right;
                color: white;
                font-size: 0.9em;
                line-height: 1;

            }
            .year-title {
                margin-top: -24%;
                margin-left: 16%;
                width: 60%;
            }
            .month-name {
                color: white;
                margin-left: 62%;
                font-size: 2em;
                float: left;
                margin-top: -16%;
            }
            .month-name_r {
                color: white;
                font-size: 2em;
                float: left;
                margin-top: -15%;
                margin-left: 95%;
            }
            .masthead {
                height: 1vh;
                min-height: 200px;
                background-image: url('{!! asset('img/calendar/egypt'.($img).'.png') !!}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }


        }


    </style>


    <style>


        @media(min-width:361px) and (max-width:572px){
            .calendar-font{
                font-family: 'Milonga', cursive;
                width: 100% !important;
                /*margin-left: 10%;*/
            }

            .calendar-font th{
                border: none;
                color: white;
                font-size: 0.8em;
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
                font-size: 1em;
                float: right;

            }
            .calendar-font td.in_month .date p{
                width: 100%;
                text-align: right !important;
                float: right;
                color: white;
                font-size: 0.9em;
                line-height: 1;

            }
            .year-title {
                margin-top: -30%;
                margin-left: 16%;
                width: 60%;
            }
            .month-name {
                color: white;
                margin-left: 62%;
                font-size: 1.6em;
                float: left;
                margin-top: -16%;
            }
            .month-name_r {
                color: white;
                font-size: 2em;
                float: left;
                margin-top: -15%;
                margin-left: 93.5%;
            }
            .masthead {
                height: 1vh;
                min-height: 200px;
                background-image: url('{!! asset('img/calendar/egypt'.($img).'.png') !!}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }


        }


    </style>






    <style>


        @media(max-width:360px){
            .calendar-font{
                font-family: 'Milonga', cursive;
                width: 100% !important;
                /*margin-left: 10%;*/
            }

            .calendar-font th{
                border: none;
                color: white;
                font-size: 0.8em;
                text-align: center;
            }
            .calendar-font td{
                border-top: 3px solid #fff;
                border-right: 3px solid #fff;
                border-left: 1px solid #fff;
                border-bottom: 1px solid #fff;
                height: 7.6em;
                width: 7.6em;
                vertical-align: top;
                color: white;
                padding: 0px;
                padding-top: 10px;
                padding-bottom: 5px;
                max-width: 50px !important;

            }
            .calendar-font td.in_month .image{
                width: 100%;
                color: white;
                padding-left: 10px;
                float: left;

            }
            .calendar-font td.in_month .image img{
                width: 32px;
            }
            .calendar-font td.in_month .jour{
                width: 48%;
                color: white;
                text-align: right;
                padding-right: 10px;
                font-size: 1em;
                float: right;

            }


            .calendar-font td.in_month .description p {
                width: 100%;
                text-align: right !important;
                float: left;
                font-size: 10px;
                color: white;
                line-height: 1;
                margin-left: -15px;
            }

            .calendar-font td.in_month .date p{
                width: 120%;
                text-align: left !important;
                float: left;
                font-size: 10px;
                color: white;
                line-height: 1;

            }
            .year-title {
                margin-top: -38%;
                margin-left: 16%;
                width: 60%;
            }
            .month-name {
                color: white;
                margin-left: 62%;
                font-size: 1.6em;
                float: left;
                margin-top: -26%;
            }
            .month-name_r {
                color: white;
                font-size: 2em;
                float: left;
                margin-top: -22%;
                margin-left: 93.5%;
            }
            .masthead {
                height: 1vh;
                min-height: 200px;
                background-image: url('{!! asset('img/calendar/egypt'.($img).'.png') !!}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }


        }


    </style>


@endsection



@section('body_class')
style="background-color: {!! $bg_color !!}"
@endsection







@section('content')






    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-light">&nbsp;</h1>
                    <p class="lead">&nbsp;</p>
                </div>
            </div>
        </div>
    </header>



    <section id="blog" class="contact-bloc" >

        <div class="container-fluid">
            <div class="row ">
                <div class="col-12 float-left">
                    <div class="oxygene-font">
                        <!--span class="y_0">{!! ("".$year)[0] !!} </span>
                        <span class="y_1">{!! ("".$year)[1] !!} </span>
                        <span class="y_2">{!! ("".$year)[2] !!} </span>
                        <span class="y_3">{!! ("".$year)[3] !!} </span-->
                            <a href="{!! route('calendar') !!}?year={!! $year !!}&month={!! $month-1 !!}"
                               class="month-name_l calendar-font"> << </a>
                        <img class="year-title" src="{!! asset('img/calendar/'.$year.'.png') !!}" alt="">
                        <span class="month-name calendar-font">{!! \App\Models\Calendar::getMonthName($month) !!} </span>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a href="{!! route('calendar') !!}?year={!! $year !!}&month={!! $month+1 !!}"
                               class="month-name_r calendar-font"> >> </a>
                            <br>&nbsp;
                    </div>
                </div>

                <div class="col-12 float-left">







                    <center>
                        <table class="calendar-font"  cellspacing="10">
                            <thead>
                            <tr>
                                <th>MON</th>
                                <th>TUE</th>
                                <th>WED</th>
                                <th>THU</th>
                                <th>FRI</th>
                                <th>SAT</th>
                                <th>SUN</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @php $cur_date = $prev_monday.""; $last_dayy = 1; $other_day = 1; @endphp
                                @while($cur_date <= $last_day)

                                    @php
                                        $date1 = new DateTime($cur_date.' 00:00:00');
                                    @endphp



                                    @if(date('w', strtotime($cur_date)) == 1)
                                    </tr><tr>
                                    @endif

                                    @php
                                        $class = (($first_day <= $cur_date) && ($cur_date <= $last_one)) ? "in_month" : "out_of_month";

                                    @endphp
                                    <td class="{!! $class !!}" data-date="{!! $cur_date !!}" data-url="{!! route('get-Calendar', $cur_date) !!}">


                                            <div class="image">
                                                @if(isset($calendars[$cur_date]) && $calendars[$cur_date]->image != null)
                                                    <img src="{!! $calendars[$cur_date]->getImageLink() !!}" alt="moon">
                                                @endif
                                            </div>
                                            <div class="jour">
                                                @if(($first_day <= $cur_date) && ($cur_date <= $last_one) )
                                                    {!! $other_day !!}
                                                @endif
                                            </div>
                                            <div class="date">
                                                <p>({!! $date1->format('M j') !!}th)</p>
                                            </div>
                                            <div class="description">
                                                <p>
                                                @if(isset($calendars[$cur_date]))
                                                    {!! $calendars[$cur_date]->title !!}
                                                @endif
                                                <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. -->
                                                </p>
                                            </div>


                                    </td>

                                    @if(($first_day <= $cur_date) && ($cur_date <= $last_one) )
                                        @php $other_day++; @endphp
                                    @endif

                                    @php
                                        if($date1->format('j') > 30)
                                            $last_dayy = 30;

                                        $date = new DateTime($cur_date.' 00:00:00');
                                        $date->modify('+1 day');
                                        $cur_date = $date->format('Y-m-d');

                                    @endphp
                                @endwhile

                            </tr>
                            </tbody>
                        </table>

                    </center>




                </div>







            </div>

            @include('feed_back.feedbackForm')
            <br><br><br><br><br>&nbsp;


        </div>
    </section>








    <div class="modal fade" id="calendar-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h3 id="title" class="title-blog"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p id="description"></p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
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
                $('#title').html("");
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
                            $('#title').html(data.title);
                            $('#description').html(data.description);
                            if(data.image != null) {
                                $('#modalLabel').html(ladate + '<img src="'+data.url_image+'" alt="moon">');
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








