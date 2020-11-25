<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


//Productos

Route::get("/productos/{id?}","ProductosController@index")->where("id","[0-9]+");

Route::post("/guardar","productosController@guardar");

Route::delete("/productos/{id}","ProductosController@eliminar")->where("id","[0-9]+");

Route::put("/productos/{id}","ProductosController@modificar")->where("id","[0-9]+");



//comentarios

Route::get("/comentarios/{id?}","ComentariosController@index")->where("id","[0-9]+");

Route::post("/comentarios","ComentariosController@guardar");

Route::delete("/comentarios/{id}","ComentariosController@eliminar")->where("id","[0-9]+");

Route::put("/comentarios/{id}","ComentariosController@modificar")->where("id","[0-9]+");



//personas

Route::get("/personas/{id?}","PersonasController@index")->where("id","[0-9]+");

Route::post("/personas","PersonasController@guardar");

Route::delete("/personas/{id}","PersonasController@eliminar")->where("id","[0-9]+");

Route::put("/personas/{id}","PersonasController@modificar")->where("id","[0-9]+");





//Ruta
Route::post("registro","Api\autentificacion@registro12");
Route::post("login","Api\autentificacion@login");

//middleware TOkken

Route::middleware('auth:sanctum')->delete("logout","Api\autentificacion@logout");

Route::middleware('auth:sanctum')->get("user","Api\autentificacion@index");

//Enviar Correo
Route::post("Mail", "API\autentificacion@Mail");




Route::post('insertar', 'userscontroller@usuario');
Route::post('enviar2', 'userscontroller@enviar2');

Route::get('verificar/{code}', 'userscontroller@Verificar');


Route::post('login', 'userscontroller@LogIn');


