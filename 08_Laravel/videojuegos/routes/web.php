<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\VideogameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/videojuegos', [VideogameController::class, 'index']); */
Route::resource('/videojuegos', VideogameController::class);
/* Va a crear todas las rutas que hagan falta y que se hayan creado con el resource (te saca una ruta por metodo) */
/* php artisan route:list para mostrar la lista de rutas */

Route::get('/consolas', [ConsoleController::class, 'index']);
//cuado alguien pida la ruta consola, voy al controlador consola y muestra el index

Route::get('/', function () {
    return view('welcome');
});
