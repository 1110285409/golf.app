<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detalles del Jugador') }}
            </h2>
            <div>
                <a href="{{ route('jugadores.edit', $jugador) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Editar
                </a>
                <a href="{{ route('jugadores.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Volver
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Información del Jugador</h3>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nombre:</p>
                                <p class="mt-1">{{ $jugador->nombre }} {{ $jugador->apellido }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Email:</p>
                                <p class="mt-1">{{ $jugador->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Teléfono:</p>
                                <p class="mt-1">{{ $jugador->telefono }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Dirección:</p>
                                <p class="mt-1">{{ $jugador->direccion }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Handicap:</p>
                                <p class="mt-1">{{ $jugador->handicap ?? 'No especificado' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900">Reservas del jugador</h3>
                        @if($reservas->isEmpty())
                            <p class="mt-4 text-gray-500">No hay reservas para este jugador.</p>
                        @else
                            <div class="mt-4 overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Campo</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Fecha</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Hora</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Duración</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Jugadores</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($reservas as $reserva)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->campo->nombre }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->fecha_reserva->format('d/m/Y') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ substr($reserva->hora_inicio, 0, 5) }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->duracion }} min</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->numero_jugadores }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('reservas.show', $reserva) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>