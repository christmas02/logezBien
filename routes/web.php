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

Route::get('/', 'FrontendController@index' )->name('front.index');
Auth::routes(['verify' => true]);

// gestion de l'immobilier

Route::get('details', 'ImmoController@index')->name('detail');
// reservation
Route::resource('reservationbackend','ReservationController');
Route::post('Reservation','ReservationController@store')->name('reservation');
Route::get('GestionReservation{id}','ReservationController@destroy')->name('reservationbackend.destroy');
Route::get('congratulations','FrontendController@congratulations')->name('front.congratulations');

Route::get('comment_marche', 'FrontendController@comment_marche')->name('front.comment_marche');
Route::get('loginClient', 'FrontendController@login')->name('front.login');
Route::get('registerClient', 'FrontendController@register')->name('front.register');
Route::get('Proprietes', 'FrontendController@propriete')->name('front.propriete');

Route::get('proprietaire', 'FrontendController@proprietaire')->name('front.proprietaire');
Route::get('reservation/{appartement_id}', 'FrontendController@reservation')->name('front.reservation');
Route::get('properties_details/{appartement_id}', 'FrontendController@properties_details')->name('front.properties_details');
Route::post('search','FrontendController@search')->name('front.search');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

// client dashboard

Route::group(['prefix'=>'Dashboard-Client','middleware'=>'user'],function() {
Route::get('Dashboard','UserController@index')->name('user.dashboard')->middleware('verified');
Route::get('Reservation','UserController@reserve')->name('user.reservation');
Route::get('Reservation{id}','UserController@delete')->name('reservation.annuler');
Route::get('ReservationView{id}','UserController@detail')->name('reservation.detail');

});

// propriétaire dashboard

Route::group(['prefix'=>'Dashboard-Proprietaire','middleware'=>'proprietaire'],function() {
    Route::get('Dashboard','proprietaireController@index')->name('proprietaire.index')->middleware('verified');
    Route::get('AddPropriete','proprietaireController@add')->name('proprietaire.add');
    Route::get('Liste_Apparts','proprietaireController@ListAppart')->name('proprietaire.appartement');
    Route::get('Liste_Reservations','proprietaireController@ListeReservation')->name('proprietaire.ListeReservation');
    Route::post('notification/{id}', 'proprietaireController@updatenoti')->name('proprietaire.notification.update');
    Route::resource('appartementAdd','ProprietaireController');
});


// admin dashboard
Route::group(['prefix'=>'Dashboard-administration','middleware'=>'admin'],function() {
Route::get('admin/','AdminController@index')->name('admin');
Route::resource('appartement','AppartementController');
Route::resource('user','UserController');
Route::get('Liste_Utilisateurs','UserController@listePro')->name('Utilisateurs');

Route::post('ActiveAppart/{id}', 'AppartementController@saved')->name('appartement.saved');
Route::post('DesactiveAppart/{id}', 'AppartementController@desactived')->name('appartement.desactived');
Route::post('ConfirmReservation/{id}', 'AppartementController@reserved')->name('appartement.reserved');
Route::post('ExpirerReservation/{id}', 'AppartementController@expirer')->name('appartement.expirer');
Route::get('DeleteAppart/{id}', 'AppartementController@delete')->name('appartement.delete');
Route::post('notification/{id}', 'AdminController@updatenoti')->name('admin.notification.update');




// localisation gestion
    Route::resource('commune','CommuneController');
//image
Route::get('image/create/{appartement_id}', 'ImagesController@create')->name('image.create');
Route::post('image', 'ImagesController@store')->name('image.store');
Route::get('image/{image}', 'ImagesController@index')->name('image.index');
Route::get('image/{image}/edit/{appartement_id}', 'ImagesController@edit')->name('image.edit');
Route::get('image/{image}/{appartement_id}', 'ImagesController@show')->name('image.show');
Route::PATCH('image/{image}/{appartement_id}', 'ImagesController@update')->name('image.update');
Route::DELETE('image/{image}/{appartement_id}', 'ImagesController@destroy')->name('image.destroy');
//disponibilite
Route::get('disponibilite/create/{appartement_id}', 'DisponibiliteController@create')->name('disponibilite.create');
Route::post('disponibilite', 'DisponibiliteController@store')->name('disponibilite.store');
Route::get('disponibilite/{disponibilite}/edit/{appartement_id}', 'DisponibiliteController@edit')->name('disponibilite.edit');
Route::PATCH('disponibilite/{disponibilite}/{appartement_id}', 'DisponibiliteController@update')->name('disponibilite.update');
Route::DELETE('disponibilite/{disponibilite}/{appartement_id}', 'DisponibiliteController@destroy')->name('disponibilite.destroy');


});
