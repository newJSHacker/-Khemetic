<?php


namespace App\Helpers\Lang;

use App\Models\TexteSite;
use App\Models\Language;
use App\Models\Social;
use App\Models\Background;
//use App\Repositories\TextSitesRepository;
//use App\Repositories\TextSiteLangueRepository;
use App;
use Session;
use Exception;
/**
 * Description of Texte
 *
 * @author ncr
 */
class Texte {



    //put your code here
    public static function changeLang($lang) {
        //App::setLocale($lang);
        app()->setLocale($lang);
    }

    public static function chargerText() {
        //$textSiteRepo = TextSitesRepository();
        if(!Session::has('textes')){
            session(['textes' => TexteSite::getAllFormated()]);
        }
    }

    public static function forcerChargerText() {
        //dd(TexteSite::getAllFormated());
        session(['textes' => TexteSite::getAllFormated()]);

        /* ===== chargerment des langues ========*/
        session(['langs' => Language::getAllFormated()]);
    }


    public static function ts($txt) {
        $lang = strtolower(App::getLocale());

        Texte::chargerText();


        if(session()->has('textes')){
            if(isset(session('textes')[$txt])){
                if(isset(session('textes')[$txt][$lang])){
                    return session('textes')[$txt][$lang];
                }
            }
        }

        return $txt;


    }



    public static function lang($txt, $lang) {
        Texte::chargerText();

        if(session()->has('textes')){
            if(isset(session('textes')[$txt])){
                if(isset(session('textes')[$txt][$lang])){
                    return session('textes')[$txt][$lang];
                }
            }
        }

        return $txt;


    }



    public static function envoi($params, $url) {
        try {
            $curl = curl_init();
            if (FALSE === $curl)
                throw new Exception('failed to initialize');
            curl_setopt($curl, CURLOPT_URL, $url.$params);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($curl, CURLOPT_VERBOSE,false);

            $content = curl_exec($curl);

            if (FALSE === $content)
                throw new Exception(curl_error($curl), curl_errno($curl));

            // ...process $content now
        } catch(Exception $e) {

            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        }
        curl_close($curl);
        return $content;
    }



	public static function getAllSocial() {
        return Social::all(); //un test

    }

    public static function getBackground($page) {
        $b = Background::where('page', $page)->first();
        if(!is_null($b)){
            return $b->getLink();
        }

        return "";

    }

}
