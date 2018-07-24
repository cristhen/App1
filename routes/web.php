<?php

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['MDmaster']], function(){
    Route::resource('consortiums','ConsortiumController');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['MDadmin']], function(){
    Route::resource('users','UserController');
    Route::resource('questions','QuestionController');

    Route::get('elections/active','ElectionController@active')->name('elections.active');
    Route::get('elections/finished','ElectionController@finished')->name('elections.finished');
    Route::get('elections/{election}/finish','ElectionController@finish')->name('electionFinish');
    Route::resource('elections','ElectionController');
});


Route::get('users/{election}/votes','VotesController@index')->name('votes');
Route::resource('users/votes','VotesController');
Route::get('/home', 'HomeController@index')->name('home');
