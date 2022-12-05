<?php

use Illuminate\Support\Facades\Route;

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

// Devolver la vista welcome
Route::get('/', function () {
    return view('welcome');// retornamos la vista --> .php
});
// Devolver un texto plano
Route::get('/saludar', function(){
    echo "<h1>Hola mundo</h1>";
});
Route::post('/post', function(){
    $datos = [ 'name' => "Post es para enviar datos en el body"];
    return json($datos);
});
Route::put('/put', function(){
    $datos = [ 'name' => "Put para acualiar los datos."];
    return json($datos);
});
Route::delete("/delete", function(){
    return json([ 'name' => "Para borrar" ]); 
});
// Pasar parametros a la vista 
Route::get("/welcome2", function(){
    return view('welcome2', [ 'name' => 'Hola Kiko']);
});
// Las rutas podemos poner un nombre
Route::get('/nombre', function(){
    return "Hola desde un ruta con nombre";
})->name('name');// ahora podemos llamar a la ruta con route('name')
// Si realizamos un php artisan route:list  --- vemos las rutas
// Rutas con controladores

