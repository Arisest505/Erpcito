<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\CategoriaProductosController;

Route::get('/', function () {
    return view('index');
})->middleware('guest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


Route::get('/logistica', function () {
    return view('logistica');
})->name('logistica');

Route::get('/contabilidad', function () {
    return view('contabilidad');
})->name('contabilidad');

Route::get('/finanzas', function () {
    return view('finanzas');
})->name('finanzas');

Route::get('/linea_avicola', function () {
    return view('linea_avicola');
})->name('linea_avicola');

Route::get('/gestor_produccion', function () {
    return view('gestor_produccion');
})->name('gestor_produccion');

Route::get('/logistica', function () {
    return view('logistica');
})->name('logistica');


Route::get('/logistica/regla_abastecimiento', function () {
    return view('regla_abastecimiento');
})->name('regla_abastecimiento');

Route::get('/logistica/unidad_medida', function () {
    return view('unidad_medida');
})->name('unidad_medida');

Route::get('/logistica/stock', function () {
    return view('stock');
})->name('stock');

Route::get('/logistica/historial_movimientos', function () {
    return view('historial_movimientos');
})->name('historial_movimientos');

Route::get('/logistica/analisis_movimiento', function () {
    return view('analisis_movimiento');
})->name('analisis_movimiento');

Route::get('/logistica/rendimiento', function () {
    return view('rendimiento');
})->name('rendimiento');

Route::get('/logistica/productos', function () {
    return view('productos');
})->name('productos');

Route::get('/logistica/seguimiento', function () {
    return view('seguimiento');
})->name('seguimiento');

Route::get('/logistica/recepcion', function () {
    return view('recepcion');
})->name('recepcion');

Route::get('/logistica/entrega', function () {
    return view('entrega');
})->name('entrega');

Route::get('/logistica/inventario', function () {
    return view('inventario');
})->name('inventario');



//aca se pondran las rutas para la creacion de datos para cada uno de las partes "LOGISTICA"



Route::get('/almacenes', [AlmacenController::class, 'index'])->name('almacenes');



Route::get('/categoria-productos', [CategoriaProductosController::class, 'index'])->name('categoria_productos');

