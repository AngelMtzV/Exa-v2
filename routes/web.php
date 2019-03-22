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
//ruta al entrar a la pagina
Route::get('/', function () {
    return view('auth.login');
});
//Rutas para el login-logout
Auth::routes();
//ruta para el inicio
Route::get('/home', 'HomeController@index')->name('home');
//ruta para ir al examen seleccionado
Route::get('/examen/{id}', 'HomeController@examen')->name('examen');
//rutas para las respuestas
Route::resource('preguntas', 'preguntaUsuario');
//rutas para los usuarios
Route::resource('usuarios', 'admninUser');
//rutas para ver los resultados
Route::resource('examenesAdmin', 'examenAdminController');
//Ruta para mostrar el examen con respuestas
Route::get('/mostrarExamen/{id_examen}/{id_usuario}', 'examenAdminController@mostrar')->name('mostrarExamen');
//rutas para el crud de las preguntas de los examenes
Route::get('preguntasAdmin/{id}', 'adminPreguntasExamen@crear')->name('preguntasAdmin');
Route::put('editPreguntaImg/{id}', 'adminPreguntasExamen@editImg')->name('editPreguntaImg');
Route::resource('preguntasAdmin', 'adminPreguntasExamen');

