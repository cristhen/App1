<?php

/*
TODOS LAS RUTAS SE PUEDEN OPTIMIZAR MEJOR, PERO EL PRESUPUESTO ABARCABA CODIGO BASICO
*/

Route::get('/', function () {
    return view('auth/login');
});


//INYECCIONES
/*Route::bind('admin/users', function($id){
  return App\User::where('id', $id)->first();
});*/


Route::get('/admin/elections/active','Admin\ElectionController@active')->name('elections.active');


Auth::routes();

Route::resource('admin/users','Admin\UserController');
Route::resource('admin/questions','Admin\QuestionController');
Route::resource('admin/elections','Admin\ElectionController');





Route::get('/home', 'HomeController@index')->name('home');




//CONSORCIOS
Route::get('/admin/consorcios','Admin\AdminController@consortiums')->name('consortiums');
Route::post('/admin/consorcios','Admin\AdminController@newConsortium')->name('newConsortium');
Route::get('/admin/consorcios/{consortium}/view', function (App\Consortium $consortium){
	return view('/admin/consortium/edit',compact('consortium'));
})->name('viewConsortium');
Route::post('/admin/consorcios/{consortium}/edit', 'Admin\AdminController@editConsortium')->name('editConsortium');
Route::delete('/admin/consorcios/{consortium}', 'Admin\AdminController@deleteConsortium')->name('deleteConsortium');




