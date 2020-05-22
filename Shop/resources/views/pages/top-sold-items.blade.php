<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25">Placed Orders</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                <tr>

                    <th>order #</th>
                    <th>date</th>
                    <th>name</th>
                    <th class="text-right">total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($inv  as $index => $i)
                    <tr>
                        <td>
                            <a href="{!! route('order-details', $i->order_no) !!}" target="_blank">
                                {{$i->order_no}}
                            </a>
                        </td>
                        <td>
                            {{$i->created_at}}
                        </td>
                        <td>{{$i->name}}</td>
                        <td class="text-right">{!! getSymboleDevise() !!} {{$i->order_amount}}</td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25">Confirmed Orders</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                <tr>
                    <th>date</th>
                    <th>order #</th>
                    <th>name</th>
                    <th class="text-right">total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($confirm  as $index => $c)

                    <tr>
                        <td>
                            <a href="{!! route('order-details', $c->order_no) !!}" target="_blank">
                                {{$c->created_at}}
                            </a>
                        </td>
                        <td>
                            <a href="{!! route('order-details', $c->order_no) !!}" target="_blank">
                                {{$c->order_no}}
                            </a>
                         </td>
                        <td>{{$c->name}}</td>
                        <td class="text-right">{!! getSymboleDevise() !!} {{$c->order_amount}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{--<div class="col-lg-3">--}}
    {{--<h2 class="title-1 m-b-25">Top countries</h2>--}}
    {{--<div class="au-card au-card--bg-blue au-card-top-countries m-b-40">--}}
    {{--<div class="au-card-inner">--}}
    {{--<div class="table-responsive">--}}
    {{--<table class="table table-top-countries">--}}
    {{--<tbody>--}}
    {{--<tr>--}}
    {{--<td>United States</td>--}}
    {{--<td class="text-right">$119,366.96</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>Australia</td>--}}
    {{--<td class="text-right">$70,261.65</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>United Kingdom</td>--}}
    {{--<td class="text-right">$46,399.22</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>Turkey</td>--}}
    {{--<td class="text-right">$35,364.90</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>Germany</td>--}}
    {{--<td class="text-right">$20,366.96</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>France</td>--}}
    {{--<td class="text-right">$10,366.96</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>Australia</td>--}}
    {{--<td class="text-right">$5,366.96</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>Italy</td>--}}
    {{--<td class="text-right">$1639.32</td>--}}
    {{--</tr>--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
</div>
</div>
