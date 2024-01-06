<?php

use App\Http\Controllers\AnalisisLineaController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrigenController;
use App\Http\Controllers\OrpController;
use App\Http\Controllers\ParametroLineaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SolicitudAnalisisLineaController;
use App\Http\Controllers\UsuarioController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    

    Route::middleware(['roles:Admi'])->group(function () {
        /*ruta para generalidades */
        Route::get('/general', [GeneralController::class, 'index'])->name('general.index');
    });
    Route::middleware(['roles:Admi,Jef'])->group(function () {
        /*User Crud*/
        Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');
    });
    /*ruta para productos */
    Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
    /*ruta para orp */
    Route::get('/orp', [OrpController::class, 'index'])->name('orp.index');

    /*ruta para origen */
    Route::get('/origen', [OrigenController::class, 'index'])->name('origen.index');
    /*ruta para parametro en linea */
    Route::get('/parametroLinea', [ParametroLineaController::class, 'index'])->name('parametroLinea.index');

    /*ruta para Solicicitud de analisis en linea */
    Route::get('/solicitudLinea', [SolicitudAnalisisLineaController::class, 'index'])->name('solicitudLinea.index');
    /*ruta para  analisis en linea */
    Route::get('/analisisLinea', [AnalisisLineaController::class, 'index'])->name('analisisLinea.index');

    /*Rutas de salida login */
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

    
    
});


/*Rutas de registro */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

/*Rutas de ingreso login */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
