
@php


    if($month == 12 || $month == 13 || $month == 1 || $month == 2){
        $bg_color = "#77C5C5";
        $color = "#FFFFFF";
    }elseif($month == 3 || $month == 4 || $month == 5 || $month == 6){
        $bg_color = "#87AD56";
        $color = "#FFFFFF";
    }elseif($month == 7){
        $bg_color = "#C0C0C0";
        $color = "#FFFFFF";
    }elseif($month == 8 || $month == 9 || $month == 10 || $month == 11){
        $bg_color = "#E7A946";
        $color = "#FFFFFF";
    }


    $first_day = $premier_jour; //date($year.'-'.sprintf("%02d", $month).'-01');
    if($month == 7){
        $nb_Jours = 4; //date("t", mktime(0, 0, 0, $month, 1, $year));
    }else{
        $nb_Jours = 29;
    }
    //dd($nb_Jours);
    $date_aa = new DateTime($first_day.' 00:00:00');
    if($month == 7){
        $date_aa->modify("+4 day"); //$nb_Jours = 4; //date("t", mktime(0, 0, 0, $month, 1, $year));
    }else{
        $date_aa->modify("+29 day"); //$nb_Jours = 29;
    }
    //$date_aa->modify("+$nb_Jours day");
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





<div class="modal fade" id="calendar-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Modal Title</h4>
            </div>
            <div class="modal-body">
                <form action="{!! route('save-calendar') !!}" method="post">
                    @csrf
                    <input type="hidden" value="" id="day" name="day">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="moon-black">
                                <input type="radio" class="" id="moon-black" name="image" value="moon-black.png">
                                <img src="{!! asset('img/calendar/moon-black.png') !!}" alt="moon">
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label for="moon-half-left">
                                <input type="radio" class="" id="moon-half-left" name="image" value="moon-half-left.png">
                                <img src="{!! asset('img/calendar/moon-half-left.png') !!}" alt="moon">
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label for="moon-half-right">
                                <input type="radio" class="" id="moon-half-right" name="image" value="moon-half-right.png">
                                <img src="{!! asset('img/calendar/moon-half-right.png') !!}" alt="moon">
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label for="moon-white">
                                <input type="radio" class="" id="moon-white" name="image" value="moon-white.png">
                                <img src="{!! asset('img/calendar/moon-white.png') !!}" alt="moon">
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="first_name">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="first_name">Description</label>
                        <textarea name="description" id="description" class="form-control"  rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
