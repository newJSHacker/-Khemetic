<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use App\Repositories\CalendarRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Calendar;
use DateTime;

class CalendarController extends AppBaseController
{
    /** @var  CalendarRepository */
    private $calendarRepository;

    private $firstDayOfYear = "2019-01-15";

    public function __construct(CalendarRepository $calendarRepo)
    {
        $this->calendarRepository = $calendarRepo;
    }

    /**
     * Display a listing of the Calendar.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        /*$this->calendarRepository->pushCriteria(new RequestCriteria($request));
        $calendars = $this->calendarRepository->all();*/

        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }



        if($request->has('month')){
            $month = $request->input('month');
        }else{
            $month = date('m');
        }

        if($request->has('year')){
            $year = $request->input('year');
        }else{
            $year = date('Y');
        }

        $calendar = $this->calendarRepository->all();


        $calendars = [];

        //get the first day of the month $firstDayOfYear
        //$nb_days = (((($year - 2019)* 12) + $month) - 1) * 30;
        //$premier_jour = date('Y-m-d', strtotime($this->firstDayOfYear." +$nb_days days"));



        if(!checkdate( $month, 1, $year )){
            if($month > 13){
                $d = new DateTime( $year.'-'.(12).'-01' );
                for($i = 0; $i < $month-13; $i++){
                    $d->modify( 'first day of next month' );
                }
                $month = $d->format( 'm' );
                $year = $d->format( 'Y' );
            }elseif ($month < 1){
                $d = new DateTime( $year.'-01-01' );
                for($i = $month; $i < 1; $i++){
                    $d->modify( 'first day of previous month' );
                }
                $month = $d->format( 'm' ) >= 7 ? sprintf("%02d", ($d->format( 'm' ) * 1 + 1)) : $d->format( 'm' );
                //dd($month);
                $year = $d->format( 'Y' );
            }
        }

        $nb_month = (((($year - 2019)* 12) + $month) - 1);
        $nb_days = $nb_month * 30;
        if($year != 2019){
            $nb_days += ($year - 2019)*5;
        }
        if($month > 7){
            $nb_days -= 25;
        }
        $premier_jour = date('Y-m-d', strtotime($this->firstDayOfYear." +$nb_days days"));








        foreach ($calendar as $c){
            $calendars["".$c->day->format('Y-m-d')] = $c;
        }


        return view('calendars.index')
            ->with('year', $year)
            ->with('month', $month)
            ->with("premier_jour", $premier_jour)
            ->with('calendars', $calendars);
    }

    /**
     * Show the form for creating a new Calendar.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('calendars.create');
    }

    /**
     * Store a newly created Calendar in storage.
     *
     * @param CreateCalendarRequest $request
     *
     * @return Response
     */
    public function store(CreateCalendarRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        $calendar = $this->calendarRepository->create($input);

        Flash::success('Calendar saved successfully.');

        return redirect(route('calendars.index'));
    }

    /**
     * Display the specified Calendar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $calendar = $this->calendarRepository->findWithoutFail($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        return view('calendars.show')->with('calendar', $calendar);
    }

    /**
     * Show the form for editing the specified Calendar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $calendar = $this->calendarRepository->findWithoutFail($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        return view('calendars.edit')->with('calendar', $calendar);
    }

    /**
     * Update the specified Calendar in storage.
     *
     * @param  int              $id
     * @param UpdateCalendarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCalendarRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $calendar = $this->calendarRepository->findWithoutFail($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        $calendar = $this->calendarRepository->update($request->all(), $id);

        Flash::success('Calendar updated successfully.');

        return redirect(route('calendars.index'));
    }

    /**
     * Remove the specified Calendar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $calendar = $this->calendarRepository->findWithoutFail($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        $this->calendarRepository->delete($id);

        Flash::success('Calendar deleted successfully.');

        return redirect(route('calendars.index'));
    }




    public function getCalendar(Request $request){
        $calendar = $this->calendarRepository->findWhere([
            'day' => $request->date
        ]);
        if($calendar->count() > 0){
            $calendar = $calendar[0];
            $calendar->url_image = $calendar->getImageLink();
        }else{
            $calendar = null;
        }
        $result = ["status" => 1, "data" => $calendar];
        return response()->json($result);

    }



    public function getCalendar2($date, Request $request){
        $calendar = $this->calendarRepository->findWhere([
            'day' => $date
        ]);
        if($calendar->count() > 0){
            $calendar = $calendar[0];
            $calendar->url_image = $calendar->getImageLink();
        }else{
            $calendar = null;
        }
        $result = ["status" => 1, "data" => $calendar];
        return response()->json($result);

    }


    public function getCalendarMonth($year, $month, Request $request){
        $date = $year.'-'.sprintf("%02d", $month)."%";
        //dd($date);
        $calendar = $this->calendarRepository->findWhere([
            ['day', 'like', $date]
        ]);
        if($calendar->count() > 0){
            //dd($calendar);
            foreach ($calendar as $c) {
                $c->url_image = $c->getImageLink();
            }
        }else{
            $calendar = null;
        }
        $result = ["status" => 1, "data" => $calendar];
        return response()->json($result);

    }




    public function saveCalendar(Request $request){

        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $calendar = $this->calendarRepository->findWhere([
            'day' => $request->day
        ]);
        if($calendar->count() > 0){
            $calendar = $calendar[0];
        }else{
            $calendar = new Calendar();
        }

        $calendar->day = $request->day;
        $calendar->description = $request->description;
        $calendar->title = $request->title;
        if($request->has('image')){
            $calendar->image = $request->image;
        }
        $calendar->created_by = auth()->user()->id;
        $calendar->save();


        return back();

    }


    public function showCalendar(Request $request)
    {

        if($request->has('month')){
            $month = $request->input('month');
        }else{
            $month = date('m');
        }

        if($request->has('year')){
            $year = $request->input('year');
        }else{
            $year = date('Y');
        }

        if(!checkdate( $month, 1, $year )){
            if($month > 13){
                $d = new DateTime( $year.'-'.(12).'-01' );
                for($i = 0; $i < $month-13; $i++){
                    $d->modify( 'first day of next month' );
                }
                $month = $d->format( 'm' );
                $year = $d->format( 'Y' );
            }elseif ($month < 1){
                $d = new DateTime( $year.'-01-01' );
                for($i = $month; $i < 1; $i++){
                    $d->modify( 'first day of previous month' );
                }
                $month = $d->format( 'm' ) >= 7 ? sprintf("%02d", ($d->format( 'm' ) * 1 + 1)) : $d->format( 'm' );
                //dd($month);
                $year = $d->format( 'Y' );
            }
        }

        $nb_month = (((($year - 2019)* 12) + $month) - 1);
        $nb_days = $nb_month * 30;
        if($year != 2019){
            $nb_days += ($year - 2019)*5;
        }
        if($month > 7){
            $nb_days -= 25;
        }
        $premier_jour = date('Y-m-d', strtotime($this->firstDayOfYear." +$nb_days days"));
        //get the first day of the month $firstDayOfYear


        //dd($premier_jour);


        $calendar = $this->calendarRepository->all();


        $calendars = [];

        foreach ($calendar as $c){
            $calendars["".$c->day->format('Y-m-d')] = $c;
        }


        return view('pages.calendar')
            ->with('year', $year)
            ->with('month', $month)
            ->with("page_feedback", \Lg::ts('CALENDAR'))
            ->with("premier_jour", $premier_jour)
            ->with('calendars', $calendars);
    }




}
