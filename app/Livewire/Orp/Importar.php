<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use League\Csv\Reader;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Producto;
use LivewireUI\Modal\ModalComponent;
use PhpParser\Node\Stmt\TryCatch;

class Importar extends ModalComponent
{
    /*cvs */
    public $archivoCsv;
    use WithFileUploads;

    public function render()
    {
        return view('livewire.orp.importar');
    }
    public function importarRegistros()
    {
        // Validar el archivo CSV
        $this->validate([
            'archivoCsv' => 'required|mimes:csv,txt'
        ]);

        // Leer y procesar el archivo CSV
        $csv = Reader::createFromPath($this->archivoCsv->getRealPath(), 'r');
        $csv->setDelimiter(','); // Configurar el delimitador como punto y coma

        $csv->setHeaderOffset(0); // Opcional: si el CSV tiene una fila de encabezado

        foreach ($csv as $registro) {
            $codigoProducto = $registro['ITEM'];
            
            // Buscar el producto por su código en el archivo CSV
            $producto = Producto::where('codigo', $codigoProducto)->first();
            if ($producto) {

                // Crear un nuevo registro en la tabla ORP con el ID del producto
                // Validar si ya existe un registro con el mismo código en la tabla ORP
                $registroExistente = Orp::where('codigo', $registro['ORP'])->first();
                if ($registroExistente) {
                    // Si el código ya existe, muestra un error y omite la creación del nuevo registro
                    // Mostrar mensaje de éxito
                    $this->dispatch('warning', mensaje: 'El archivo contiene');
                    continue;
                }
                try {
                    Orp::create([
                        'codigo' => $registro['ORP'],
                        'producto_id' => $producto->id,
                        'estado' => 'Pendiente',
                    ]);
                    $this->dispatch('actualizar_tabla_orps');
                    $this->closeModal();
                    $this->dispatch('success', mensaje: 'Impostacion exitosamente');
                } catch (\Throwable $th) {
                    $this->closeModal();
                    $this->dispatch('error', mensaje: 'Error: ' . $th);
                }
            }
        }

        // Limpiar el campo del archivo CSV
        $this->archivoCsv = '';
        // Mostrar un mensaje de éxito si no hay errores

    }
}
