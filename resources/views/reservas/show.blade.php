<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detalles de la Reserva') }}
            </h2>
            <div>
                <a href="{{ route('reservas.edit', $reserva) }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mr-2">
                    Editar
                </a>
                <a href="{{ route('reservas.index') }}" class="bg-gray-500 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded">
                    Volver
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Información de la Reserva</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Fecha:</p>
                                    <p class="mt-1">{{ $reserva->fecha_reserva->format('d/m/Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Hora de inicio:</p>
                                    <p class="mt-1">{{ substr($reserva->hora_inicio, 0, 5) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Duración:</p>
                                    <p class="mt-1">{{ $reserva->duracion }} minutos</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Número de jugadores:</p>
                                    <p class="mt-1">{{ $reserva->numero_jugadores }}</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Información del Campo</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Nombre:</p>
                                    <p class="mt-1">{{ $reserva->campo->nombre }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Ubicación:</p>
                                    <p class="mt-1">{{ $reserva->campo->ubicacion }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Tipo:</p>
                                    <p class="mt-1">{{ $reserva->campo->tipo }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Tarifa:</p>
                                    <p class="mt-1">€{{ number_format($reserva->campo->tarifa, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Información del Jugador</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nombre:</p>
                                <p class="mt-1">{{ $reserva->jugador->nombre }} {{ $reserva->jugador->apellido }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Email:</p>
                                <p class="mt-1">{{ $reserva->jugador->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Teléfono:</p>
                                <p class="mt-1">{{ $reserva->jugador->telefono }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Dirección:</p>
                                <p class="mt-1">{{ $reserva->jugador->direccion }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Handicap:</p>
                                <p class="mt-1">{{ $reserva->jugador->handicap ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" 
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')">
                                Eliminar Reserva
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>