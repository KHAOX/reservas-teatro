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
    return view('welcome');
});

//Route::resource('reservas', 'ReservasController');

// Route::get('/reservas/{id}', function () {
//     return view('reservas.index',[]);
// });

Route::get('/reservas/{id}', 'ReservasController@index');

Route::post('/reservar', 'ReservasController@reservar');

Route::post('/reserva/destroy', 'ReservasController@destroy');

Route::resource('usuarios', 'UsuariosController');