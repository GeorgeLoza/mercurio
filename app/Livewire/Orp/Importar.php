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
        $csv->setDelimiter(';'); // Configurar el delimitador como punto y coma

        $csv->setHeaderOffset(0); // Opcional: si el CSV tiene una fila de encabezado
        $contador = 0;
        foreach ($csv as $registro) {
            $codigoProducto = $registro['ITEM'];

            // Buscar el producto por su código en el archivo CSV
            $producto = Producto::where('codigo', $codigoProducto)->first();

            if ($producto) {
                $contador  = $contador + 1;
                // Crear un nuevo registro en la tabla ORP con el ID del producto
                // Validar si ya existe un registro con el mismo código en la tabla ORP
                
                $registroExistente = Orp::where('codigo', $registro['ORP'])->first();
                if ($registroExistente) {
                    // Si el código ya existe, muestra un error y omite la creación del nuevo registro
                    // Mostrar mensaje de éxito
                    $this->dispatch('warning', mensaje: 'El archivo contiene ORPs repetidas');
                    
                    continue;
                }
                

                // Extraer el número de lotes de los comentarios
                $comentarios = $registro['Comentarios'];

                if (preg_match('/(\d+(?:\.\d+)?)\s*(?:LOTE|LOTES|Lote|Lotes)\b/', $comentarios, $matches)) {
                    // Si se encuentra "LOTE" o "LOTES", se asigna el valor directamente
                    $lotes = $matches[1];
                } elseif (preg_match('/(\d+(?:\.\d+)?)\s*(?:MIX|mix|Mix)\b/', $comentarios, $matches)) {
                    // Si se encuentra "MIX" o variantes, se convierte a lotes (1 lote = 270 mix)
                    $lotes = $matches[1] * 0.108;
                } else {
                    // En caso de no encontrar "LOTE" o "MIX", asignar null
                    $lotes = null;
                }

                try {
                    Orp::create([
                        'codigo' => $registro['ORP'],
                        'producto_id' => $producto->id,
                        'estado' => 'Pendiente',
                        'lote' => $lotes,
                    ]);
                    $this->dispatch('actualizar_tabla_orps');
                    $this->closeModal();
                    $this->dispatch('success', mensaje: 'Importacion realizada exitosamente cantidad de orps registradas:   ' . $contador);
                } catch (\Throwable $th) {
                    $this->closeModal();
                    $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
                }
            } else {
                $this->dispatch('alert', mensaje: 'Importacion realizada exitosamente cantidad de orps registradas:   ' . $contador);
            }
        }

        // Limpiar el campo del archivo CSV
        $this->archivoCsv = '';
        // Mostrar un mensaje de éxito si no hay errores

    }
}
