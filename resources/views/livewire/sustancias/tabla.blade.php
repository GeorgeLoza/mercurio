<div wire:poll.10s>
  
    
    <div>
        <h3 class="text-xl font-bold mb-4">Cantidad Actual por Ítems:</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($totalesPorItem as $datos)
                <div 
                    class="border rounded-lg shadow p-4 transition-colors 
                           bg-white dark:bg-gray-800 
                           text-gray-900 dark:text-white">
                    <h4 class="text-lg font-semibold">{{ $datos['nombre'] }}</h4>
                    <p class="text-gray-600 dark:text-gray-400">
                        Cantidad Actual: <span class="font-bold">{{ $datos['cantidad_actual'] }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>


    <div class="p-4">
        <h2 class="text-lg font-semibold mb-4">Movimientos</h2>
    
        <!-- Tabla de movimientos -->
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-2">Código</th>
                    <th scope="col" class="px-4 py-2">Usuario</th>
                    <th scope="col" class="px-4 py-2">Tipo</th>
                    <th scope="col" class="px-4 py-2">Estado</th>
                    <th scope="col" class="px-4 py-2">Tiempo</th>
                    <th scope="col" class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $mov)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-2">SUS-{{ $mov->id }}</td>
                        <td class="px-4 py-2">{{ $mov->user->nombre }} {{ $mov->user->apellido }}</td>
                        
                        <td class="px-4 py-2"> @if ($mov->tipo ==1 )
                            <div class="flex ">

                                <svg class="h-4 w-4 fill-green-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2 160 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-306.7L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/></svg>
                            
                                 Entrada
                                </div>
                            @else
                            <div class="flex ">
                                <svg class="h-4 w-4 fill-red-500" 
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
                                
                            Salida
                        </div>
                        @endif</td>
                        <td class="px-4 py-2 font-bold uppercase
                        @if ($mov->estado == 'Entregado')
                            text-green-500
                            
                        @endif
                        @if ($mov->estado == 'Denegado')
                            text-red-500
                            
                        @endif
                        @if ($mov->estado == 'Autorizado')
                            text-yellow-500
                            
                        @endif
                        @if ($mov->estado == 'solicitado')
                            text-blue-500
                            
                        @endif
                        
                        
                        ">{{ $mov->estado }}</td>
                        <td class="px-4 py-2">{{ $mov->tiempo }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <!-- Botón para ver/ocultar detalles -->
                            <button wire:click="toggleDetalles({{ $mov->id }})"
                                class="bg-blue-500 text-white px-2 py-1 rounded-md">
                                {{ isset($detallesAbiertos[$mov->id]) ? 'Ocultar' : 'Ver detalles' }}
                            </button>
    


                            @if ($mov->tipo == 0 )


                            @if (in_array(auth()->user()->id, [2 , 5 ]) )

                            @if ($mov->estado !='Entregado')
                                
                            
                                @if ($mov->estado !='Autorizado')
                            <!-- Botón para autorizado -->
                            <button wire:click="cambiarEstado1({{ $mov->id }})"
                                class="bg-green-500 text-white px-2 py-1 rounded-md">
                                Autorizar
                            </button>
                            @endif

                            @if ($mov->estado !='Denegado')
                            <!-- Botón para denegado -->
                            <button wire:click="cambiarEstado2({{ $mov->id }})"
                                class="bg-red-500 text-white px-2 py-1 rounded-md">
                                Denegar
                            </button>
                            @endif
                            @endif
                            @endif


                            @if ($mov->estado =='Autorizado')
                            @if (in_array(auth()->user()->id, [15 ]) )
                            <!-- Botón para entregado -->
                    <button wire:click="cambiarEstado3({{ $mov->id }})"
                        class="bg-yellow-500 text-white px-2 py-1 rounded-md">
                        Entregado
                    </button>
                                
                            @endif


                            @endif
                            
                            @endif
                            


                        </td>
                    </tr>
                    @if (isset($detallesAbiertos[$mov->id]))
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <td colspan="6" class="px-4 py-2">
                                <h3 class="text-md font-semibold "></h3>
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-4 py-2">Item</th>
                                            <th scope="col" class="px-4 py-2">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mov->detalleMovs as $detalle)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-4 py-2">
                                                    {{ $detalle->item->codigo }} - {{ $detalle->item->nombre }}
                                                </td>
                                                <td class="px-4 py-2">{{ $detalle->cantidad }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $movimientos->links() }}
        </div>
    </div>
    
    
    
</div>
