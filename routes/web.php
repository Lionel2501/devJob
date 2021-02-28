<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificacionesController;

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

Auth::routes();

//routas protegidas
Route::group(['middleware' => [('auth')]], function (){
    Route::get('/vacante', [App\Http\Controllers\VacanteController::class, 'index'])->name('vacantes.index');
    Route::get('/vacante/create', [App\Http\Controllers\VacanteController::class, 'create'])->name('vacantes.create');
    Route::post('/vacantes', [App\Http\Controllers\VacanteController::class, 'store'])->name('vacantes.store');
    Route::get('/vacantes/{vacante}/edit', [App\Http\Controllers\VacanteController::class, 'edit'])->name('vacantes.edit');
    Route::put('/vacantes/{vacante}/update', [App\Http\Controllers\VacanteController::class, 'update'])->name('vacantes.update');

    //subir imagenes
    Route::post('/vacantes/imagen', [App\Http\Controllers\VacanteController::class, 'imagen'])->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', [App\Http\Controllers\VacanteController::class, 'borrarimagen'])->name('vacantes.borrarimagen');

    //Cambiar estado de la vacante
    Route::post('/vacantes/{vacante}', [App\Http\Controllers\VacanteController::class, 'estado'])->name('vacantes.estado');

    //notificaciones
    Route::get('/notificaciones', [App\Http\Controllers\NotificacionesController::class, 'notificacion'])->name('notificaciones');

    //borrar vacante
    Route::delete('/vacantes/{vacante}', [App\Http\Controllers\VacanteController::class, 'destroy'])->name('vacantes.delete');
});

//pagina de inicio
Route::get('/', [App\Http\Controllers\InicioController::class, 'index'])->name('inicio.index');
Route::get('/home', [App\Http\Controllers\InicioController::class, 'index'])->name('inicio.index');

//categorias
Route::get('/categorias/{categoria}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.show');

//routas publicas
Route::get('/vacante/{vacante}', [App\Http\Controllers\VacanteController::class, 'show'])->name('vacantes.show');
Route::get('/candidato/{candidato}', [App\Http\Controllers\CandidatoController::class, 'show'])->name('candidato.show');
Route::get('/candidato/{candidato}', [App\Http\Controllers\CandidatoController::class, 'show'])->name('candidato.show');
Route::get('/candidatos/{id}', [App\Http\Controllers\CandidatoController::class, 'index'])->name('candidato.index');

//buscar vacantes (filtro)
Route::get('/busqueda/resultados', [App\Http\Controllers\VacanteController::class, 'resultados'])->name('vacantes.resultados');
Route::post('/busqueda/buscar', [App\Http\Controllers\VacanteController::class, 'buscar'])->name('vacantes.buscar');

//almacenar candidatos desde el formulario
Route::post('/candidato/store', [App\Http\Controllers\CandidatoController::class, 'store'])->name('candidato.store');
