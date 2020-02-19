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
    //dd( 'here');
    return view('welcome');
});



Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');



Route::get('/users', function () {
    $users= DB::table('vp_demandeurs')->select('*')->get();
    dd( $users );

});

//Bibliotheques
Route::post('/visites/bibliotheques/biblSearch', 'BibliothequeController@biblSearch')->name('biblSearch');
Route::resource('/visites/bibliotheques', 'BibliothequeController');



//hemicycles
Route::put('/visites/hemicycles/{hemicycles}', 'HemicycleController@updateCompanion')->name('updateCompanion');
Route::get('visites/hemicycles/getCompanion', 'HemicycleController@getCompanion');
Route::post('/visites/hemicycles/search', 'HemicycleController@search')->name('search');
Route::get('visites/hemicycles/choix', 'HemicycleController@choix');
Route::resource('/visites/hemicycles', 'HemicycleController');




//pavillons
Route::post('/visites/pavillons/getSearch', 'PavillonController@getSearch')->name('getSearch');
Route::resource('/visites/pavillons', 'PavillonController');


//calandriers
Route::post('/visites/calandriers/caladSearch', 'CalandrierController@caladSearch')->name('caladSearch');
Route::resource('/visites/calandriers', 'CalandrierController');



Route::get('visites/succes', function () {
    return view('visites/succes');
});

Route::get('/confirm', function () {
     return new App\Mail\SendEmail();
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
