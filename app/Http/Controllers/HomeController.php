<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lg;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except("sendPhone");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        //dd("test9");
        Lg::forcerChargerText();
        return view('home');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendPhone(Request $request)
    {
        try {
            $curl = curl_init();
            if (FALSE === $curl)
                throw new Exception('failed to initialize');

            $data = [
                "customer_number" => $request->tel,
                "UserID" => "4104",
                "FallbackNumber" => "+13102725438",
                "operator_phone_number" => "+12093559168",
                "key" => "B1B0BB87-108C-4BC0-8C5B-DB39F29DA4D1",
                "ApiKey" => "B1B0BB87-108C-4BC0-8C5B-DB39F29DA4D1",
            ];

            curl_setopt($curl, CURLOPT_URL, "http://api.blacktradelines.com");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($curl, CURLOPT_VERBOSE,false);

            $content = curl_exec($curl);

            if (FALSE === $content)
                throw new Exception(curl_error($curl), curl_errno($curl));

            return back();
        } catch(Exception $e) {

            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        }
        curl_close($curl);
        return $content;
    }









}
