<?php

/*
TODOS LAS RUTAS SE PUEDEN OPTIMIZAR MEJOR, PERO EL PRESUPUESTO ABARCABA CODIGO BASICO
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'Admin\AdminController@index')->name('admin');

//USUARIOS
Route::get('/admin/usuarios','Admin\AdminController@users')->name('users');
Route::post('/admin/usuarios','Admin\AdminController@newUser')->name('newUser');
Route::get('/admin/usuarios/{user}/view', function (App\User $user){
	return view('/admin/users/edit',compact('user'));
})->name('viewUser');
Route::post('/admin/usuarios/{user}/edit', 'Admin\AdminController@editUser')->name('editUser');
Route::delete('/admin/usuarios/{user}', 'Admin\AdminController@deleteUser')->name('deleteUser');



//CONSORCIOS
Route::get('/admin/consorcios','Admin\AdminController@consortiums')->name('consortiums');
Route::post('/admin/consorcios','Admin\AdminController@newConsortium')->name('newConsortium');
Route::get('/admin/consorcios/{consortium}/view', function (App\Consorcio $consortium){
	return view('/admin/consortium/edit',compact('consortium'));
})->name('viewConsortium');
Route::post('/admin/consorcios/{consortium}/edit', 'Admin\AdminController@editConsortium')->name('editConsortium');
Route::delete('/admin/consorcios/{consortium}', 'Admin\AdminController@deleteConsortium')->name('deleteConsortium');





Route::get('/admin/preguntas', 'Admin\AdminController@questions')->name('questions');
Route::get('/admin/votaciones', 'Admin\AdminController@voting')->name('voting');

