<?php

use App\Http\Controllers\AlmacenProductoTerminadoController;
use App\Http\Controllers\AnalisisLineaController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\EstadoPlantaController;
use App\Http\Controllers\ExternoController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\LecheController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrigenController;
use App\Http\Controllers\OrpController;
use App\Http\Controllers\ParametroLecheController;
use App\Http\Controllers\ParametroLineaController;
use App\Http\Controllers\PaseTurnoController;
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



    Route::middleware(['role.permission:1,2'])->group(function () {
        Route::get('/', function () {
            return view('welcome');
        })->name('inicio');
    });

    Route::middleware(['role.permission:2,2'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.index');
        })->name('dashboard.index');
    });

    Route::middleware(['role.permission:3,2'])->group(function () {
        /*ruta para estado de la planta */
        Route::get('/estado', [EstadoPlantaController::class, 'index'])->name('estado.index');
    });

    Route::middleware(['role.permission:4,2'])->group(function () {
        /*User Crud*/
        Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');
    });

    Route::middleware(['role.permission:5,2'])->group(function () {
        Route::get('/general', [GeneralController::class, 'index'])->name('general.index');
    });

    Route::get('/usuario/perfil', [UsuarioController::class, 'perfil'])->name('usuario.perfil');

    Route::middleware(['role.permission:6,2'])->group(function () {
        /*ruta para origen */
        Route::get('/origen', [OrigenController::class, 'index'])->name('origen.index');
    });

    Route::middleware(['role.permission:7,2'])->group(function () {
        /*ruta para productos */
        Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
    });







    Route::middleware(['role.permission:9,2'])->group(function () {


        Route::get('/parametroLinea', [ParametroLineaController::class, 'index'])->name('parametroLinea.index');
    });
    Route::middleware(['role.permission:10,2'])->group(function () {


        Route::get('/parametroLeche', [ParametroLecheController::class, 'indexLeche'])->name('parametroLeche.indexLeche');
    });

    Route::middleware(['role.permission:11,2'])->group(function () {
        /*ruta para orp */
        Route::get('/orp', [OrpController::class, 'index'])->name('orp.index');

        /*ruta para reporte orp */
        Route::get('/orp/reporte/{id}', [OrpController::class, 'report'])->name('orp.report');
        Route::get('/orp/kanan', [OrpController::class, 'kanban'])->name('orp.kanban');
        Route::get('/descargar-pdfLac/{id}', [OrpController::class, 'generateLac'])->name('descargarLac.pdf');



        Route::get('/descargar-pdfUHT/{id}', [OrpController::class, 'generateUHT'])->name('descargarUHT.pdf');

        Route::get('/descargar-pdfYog/{id}', [OrpController::class, 'generateYog'])->name('descargarYog.pdf');
        Route::get('/descargar-pdfJugo/{id}', [OrpController::class, 'generateJugo'])->name('descargarJugo.pdf');
    });
    Route::middleware(['role.permission:12,2'])->group(function () {
        Route::get('/uht', function () {
            return view('uht.index');
        })->name('uht.index');
    });

    Route::middleware(['role.permission:13,2'])->group(function () {
        Route::get('/htst', function () {
            return view('htst.index');
        })->name('htst.index');
    });
    Route::middleware(['role.permission:14,2'])->group(function () {
        /*ruta para Solicicitud de analisis en linea */
        Route::get('/solicitudLinea', [SolicitudAnalisisLineaController::class, 'index'])->name('solicitudLinea.index');
    });
    Route::middleware(['role.permission:15,2'])->group(function () {
        /*ruta para  analisis en linea */
        Route::get('/analisisLinea', [AnalisisLineaController::class, 'index'])->name('analisisLinea.index');
    });
    Route::middleware(['roles:Admi'])->group(function () {
        /*ruta para  almacen */
        Route::get('/almacen/productoTerminado', [AlmacenProductoTerminadoController::class, 'index'])->name('almacenProductoTerminado.index');
    });
    Route::middleware(['role.permission:16,2'])->group(function () {
        /*ruta para  contador */
        Route::get('/contador/productoTerminado', [ContadorController::class, 'index'])->name('contadorProductoTerminado.index');
    });
    Route::middleware(['role.permission:19,2'])->group(function () {
        /*leche */
        Route::get('/leche/recepcion', [LecheController::class, 'recepcion'])->name('leche_recepcion.index');
    });
    Route::middleware(['role.permission:20,2'])->group(function () {
        /*ruta para  analisis en linea */
        Route::get('/leche/analisis', [LecheController::class, 'analisis'])->name('leche_analisis.index');
    });

    Route::get('/paseTurno', [PaseTurnoController::class, 'index'])->name('paseTurno.index');

    Route::middleware(['role.permission:21,2'])->group(function () {
        /*rtas para analisis externo y sus respectivas solicitudes */
        Route::get('/externo/verificacionEquipo', [ExternoController::class, 'verificacionEquipo'])->name('verificacionEquipo.index');
    });

    Route::middleware(['role.permission:22,2'])->group(function () {
        Route::get('/externo/solicitudPlanta', [ExternoController::class, 'solicitudPlanta'])->name('solicitudPlanta.index');
        Route::get('/externo/detalleSolicitudPlanta', [ExternoController::class, 'detalleSolicitudPlanta'])->name('detalleSolicitudPlanta.index');
    });
    Route::middleware(['role.permission:23,2'])->group(function () {
        Route::get('/externo/productosPlanta', [ExternoController::class, 'productosPlanta'])->name('productosPlanta.index');
    });
    Route::middleware(['role.permission:24,2'])->group(function () {
        Route::get('/externo/certificado', [ExternoController::class, 'certificado'])->name('certificado.index');
        Route::get('/externo/certificadoMicrobiologia', [ExternoController::class, 'certificadoMicrobiologia'])->name('certificadoMicrobiologia.index');
        Route::get('/certificado/pdf_cer/{id}', [CertificadoController::class, 'certificado_micro_pdf'])->name('certificado.pdf_cer');
        Route::get('/certificado/pdf_cer2/{id}', [CertificadoController::class, 'certificado_micro_pdf2'])->name('certificado.pdf_cer2');
        Route::get('/certificado_fis/pdf_cer/{id}', [CertificadoController::class, 'certificado_fisi_pdf'])->name('certificado_fis.pdf_cer');
    });
    Route::middleware(['role.permission:25,2'])->group(function () {
        Route::get('/externo/informacion', [ExternoController::class, 'informacion'])->name('informacion.index');
    });
    Route::middleware(['role.permission:26,2'])->group(function () {
        Route::get('/externo/tipoMuestra', [ExternoController::class, 'tipoMuestra'])->name('tipoMuestra.index');
    });
    Route::middleware(['role.permission:27,2'])->group(function () {
        Route::get('/externo/actividadAgua', [ExternoController::class, 'actividadAgua'])->name('actividadAgua.index');
    });
    Route::middleware(['role.permission:31,2'])->group(function () {
        Route::get('/externo/aguaFisico', [ExternoController::class, 'aguaFisico'])->name('aguaFisico.index');
    });
    Route::middleware(['role.permission:28,2'])->group(function () {
        Route::get('/externo/microbiologia', [ExternoController::class, 'microbiologia'])->name('microbiologia.index');
    });




    Route::middleware(['role.permission:30,2'])->group(function () {
        Route::get('/sustanciasControladas', function () {
            return view('sustanciasControladas.index');
        })->name('sustanciasControladas.index');
    });





    /*Rutas de salida login */
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');



    Route::middleware(['role.permission:29,2'])->group(function () {

        /*ruta para reporte de daatos */
        Route::get('/datos', [DatosController::class, 'index'])->name('datos.index');
    });



});


/*Rutas de registro */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

/*Rutas de ingreso login */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
