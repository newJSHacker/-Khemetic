<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/shop', 'ProduitAPIController@index')->name('shop');



Route::resource('produits', 'ProduitAPIController');

Route::resource('downloads', 'DownloadAPIController');

Route::resource('contact_adresses', 'ContactAdresseAPIController');

Route::resource('texte_sites', 'TexteSiteAPIController');

Route::resource('texte_site_langues', 'TexteSiteLangueAPIController');

Route::resource('languages', 'LanguageAPIController');

Route::resource('users', 'UserAPIController');

Route::resource('subscribs', 'SubscribAPIController');

Route::resource('contacts', 'ContactAPIController');

Route::resource('contacts', 'ContactAPIController');

Route::resource('socials', 'SocialAPIController');

Route::resource('backgrounds', 'BackgroundAPIController');

Route::resource('categories', 'CategorieAPIController');

Route::resource('media', 'MediaAPIController');

Route::resource('media_associers', 'MediaAssocierAPIController');