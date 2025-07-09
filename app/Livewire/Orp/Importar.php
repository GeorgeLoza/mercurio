<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use League\Csv\Reader;
use Livewire\Component;
use App\Models\Producto;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use PhpParser\Node\Stmt\TryCatch;
use LivewireUI\Modal\ModalComponent;
use Maatwebsite\Excel\Facades\Excel;

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
    $this->validate([
        'archivoCsv' => 'required|mimes:csv,txt,xlsx,xls'
    ]);

    $extension = $this->archivoCsv->getClientOriginalExtension();

    $registros = [];

    if (in_array($extension, ['csv', 'txt'])) {
        // Leer como CSV
        $contenido = file_get_contents($this->archivoCsv->getRealPath());
        $delimitador = substr_count($contenido, '|') > substr_count($contenido, ';') ? '|' : ';';
        $csv = \League\Csv\Reader::createFromString($contenido);
        $csv->setDelimiter($delimitador);
        $csv->setHeaderOffset(0);
        $registros = iterator_to_array($csv->getRecords());
    } else {
        // Leer como Excel
        $registros = Excel::toCollection(null, $this->archivoCsv)[0]; // Primera hoja
        // Convertir a array asociativo si tiene cabecera
        $cabecera = $registros->first();
        $registros = $registros->skip(1)->map(function ($fila) use ($cabecera) {
            return $cabecera->combine($fila);
        })->toArray();
    }

    // A partir de aquí, tu lógica actual sigue igual
    $contador = 0;
    foreach ($registros as $registro) {
        $codigoProducto = $registro['ITEM'];

        $producto = Producto::where('codigo', $codigoProducto)->first();

        if ($producto) {
            $contador++;

            $registroExistente = Orp::where('codigo', $registro['ORP'])->first();
            if ($registroExistente) {
                $this->dispatch('warning', mensaje: 'El archivo contiene ORPs repetidas');
                continue;
            }

            $comentarios = $registro['Comentarios'];
            if (preg_match('/(\d+(?:\.\d+)?)\s*(?:LOTE|LOTES|Lote|Lotes)\b/', $comentarios, $matches)) {
                $lotes = $matches[1];
            } elseif (preg_match('/(\d+(?:\.\d+)?)\s*(?:MIX|mix|Mix)\b/', $comentarios, $matches)) {
                $lotes = $matches[1] * 0.108;
            } else {
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

    $this->archivoCsv = '';
}
}
