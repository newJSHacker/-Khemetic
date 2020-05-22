<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    \Lg::forcerChargerText();
    return view('pages.home')->with("page_feedback", \Lg::ts('HOME'));
});


Route::get('join-us', 'SubscribController@joinUs')->name('join-us');
Route::post('join-us', 'SubscribController@joinUsSave')->name('join-us');


Route::get('/shop', 'ProduitController@shop')->name('shop');

Route::get('/membership', 'DownloadController@membership')->name('membership');
Route::get('/tribal-services', 'DownloadController@tribalServices')->name('tribal-services');
Route::post('/save-subscrib', 'SubscribController@store')->name('save-subscrib');

Route::get('magazines', 'MediaController@mediaPage')->name('magazines');

Route::post('get-media', 'MediaController@getMedia')->name('get-media');

Route::get('download/{fichier}', 'MediaController@download')->name('download');

Route::get('media-detail/{id}', 'MediaController@mediaDetail')->name('media-detail');

Route::post('send-call-phone', 'HomeController@sendPhone')->name('send-call-phone');



Route::get('calendar', 'CalendarController@showCalendar')->name('calendar');

/*
Route::get('membership', function () {
    return view('pages.membership');
});*/

/*Route::get('tribal-services', function () {
    return view('pages.tribal_services');
});*/

Route::get('contact-us', function () {
    Lg::forcerChargerText();
    return view('pages.contact')->with("page_feedback", \Lg::ts('CONTACT_US'));
});
Route::get('donate', function () {
    Lg::forcerChargerText();
    return view('pages.donate')->with("page_feedback", \Lg::ts('DONATE'));
})->name('donate');

Route::get('paypal', function () {
    return view('pages.paypal');
})->name('paypal');


Route::get('setlang/{lang}', 'LanguageController@setLanguage')->name('language.set');



Route::get('admin/login', 'Auth\AdminLoginController@loginView')->name('admin/login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin/login');
Route::post('user/login', 'UserController@login')->name('user/login');



Route::get('page/{code}', 'PageStaticController@showPage')->name('page');


Auth::routes();






Route::group(['middleware' => ['auth']], function () {








    Route::get('/home-user', 'FeedBackController@myfeedBack')->name('home-user');
    Route::get('my-feedBack', 'FeedBackController@myfeedBack')->name('my-feedBack');



    //Route::group(['middleware' => ['admin']], function () {

        Route::resource('produits', 'ProduitController');

        Route::resource('downloads', 'DownloadController');


        Route::resource('testSites', 'TestSiteController');

        Route::get('dashboard', 'HomeController@index')->name('dashboard');
        Route::get('home', 'HomeController@index')->name('home');
        Route::get('admins', 'UserController@index2')->name('admins');

        Route::get('/downloads-active_auth/{id}/{val}', 'DownloadController@activeAuth')->name('downloads.active_auth');

        Route::get('/downloads-active/{id}/{val}', 'DownloadController@active')->name('downloads.active');


        Route::resource('texteSites', 'TexteSiteController');

        Route::resource('texteSiteLangues', 'TexteSiteLangueController');

        Route::resource('languages', 'LanguageController');

        Route::resource('users', 'UserController');

        Route::post('texteSiteLangues/update', 'TexteSiteLangueController@updateApi')->name('texteSiteLangues.update');

        Route::post('texteSiteLangues/new', 'TexteSiteLangueController@newApi')->name('texteSiteLangues.new');

        Route::resource('subscribs', 'SubscribController');

        Route::resource('contacts', 'ContactController');

        Route::resource('socialmedia', 'SocialController');


        Route::resource('backgrounds', 'BackgroundController');

        Route::resource('categories', 'CategorieController');

        Route::resource('media', 'MediaController');

        Route::resource('associateMedia', 'MediaAssocierController');


        Route::resource('calendars', 'CalendarController');

        Route::post('save-calendar', 'CalendarController@saveCalendar')->name('save-calendar');


        Route::resource('pageStatics', 'PageStaticController');

    //});





});


Route::post('get-Calendar', 'CalendarController@getCalendar')->name('get-Calendar');

Route::get('api/get-Calendar/{date}', 'CalendarController@getCalendar2')->name('api/get-Calendar');
Route::get('api/get-Calendar-month/{year}/{month}', 'CalendarController@getCalendarMonth')->name('api/get-Calendar');

Route::resource('contactAdresses', 'ContactAdresseController');


Route::resource('contacts', 'ContactController');



Route::resource('feedBack', 'FeedBackController');


Route::resource('creditCards', 'CreditCardController');