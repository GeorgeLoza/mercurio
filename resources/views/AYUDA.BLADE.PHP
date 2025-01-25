public function save(int $tipo)
    {
        $this->validate();

        try {
            $estado = $tipo === 1 ? 'Entregado' : 'Solicitado'; // Definir estado según tipo de movimiento

            'item_id' => $detalle['item_id'],
            'cantidad' => $detalle['cantidad'],
            'saldo' => $nuevoSaldo,
            if ($this->movimiento) {
                // Actualizar movimiento existente
                $this->movimiento->update([
                    'estado' => 'Entregado',
                    'entregante' => auth()->user()->id,
                    'tipo' => $tipo,
                    'tiempo' => now(),
                ]);

                // Eliminar detalles previos
                $this->movimiento->detalleMovs()->delete();

                // Calcular y agregar los detalles con saldo
                $detallesConSaldo = collect($this->detalles)->map(function ($detalle) use ($tipo) {
                    $ultimoSaldo = DetalleMov::where('item_id', $detalle['item_id'])
                        ->latest('id') // Obtener el saldo más reciente para el item
                        ->value('saldo') ?? 0;

                    $nuevoSaldo = $ultimoSaldo + ($detalle['cantidad'] * ($tipo === 1 ? 1 : -1));

                    return [
                    ];
                });

                // Guardar los detalles
                $this->movimiento->detalleMovs()->createMany($detallesConSaldo);

                session()->flash('success', 'Movimiento actualizado exitosamente.');
            } else {
                // Crear un nuevo movimiento
                $this->movimiento = Mov::create([
                    'user_id' => auth()->user()->id,
                    'tiempo' => now(),
                    'tipo' => $tipo,
                    'estado' => $estado,
                ]);

                // Calcular y agregar los detalles con saldo
                $detallesConSaldo = collect($this->detalles)->map(function ($detalle) use ($tipo) {
                    $ultimoSaldo = DetalleMov::where('item_id', $detalle['item_id'])
                        ->latest('id') // Obtener el saldo más reciente para el item
                        ->value('saldo') ?? 0;

                    $nuevoSaldo = $ultimoSaldo + ($detalle['cantidad'] * ($tipo === 1 ? 1 : -1));

                    return [
                        'item_id' => $detalle['item_id'],
                        'cantidad' => $detalle['cantidad'],
                        'saldo' => $nuevoSaldo,
                    ];
                });

                // Guardar los detalles
                $this->movimiento->detalleMovs()->createMany($detallesConSaldo);

                session()->flash('success', 'Movimiento creado exitosamente.');
            }

            $this->closeModal();

            if ($tipo === 1) {
                $this->dispatch('actualizar_movimiento_sustancia');
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'Ocurrió un error al guardar el movimiento.');
            // \Log::error($th->getMessage());
        }
    }
