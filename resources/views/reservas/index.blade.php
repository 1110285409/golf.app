<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reservas') }}
            </h2>
            <a href="{{ route('reservas.create') }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                Nueva Reserva
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($reservas->isEmpty())
                        <p class="text-gray-500">No hay reservas registradas actualmente.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Campo</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Jugador</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Hora</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Jugadores</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($reservas as $reserva)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->campo->nombre }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->jugador->nombre }} {{ $reserva->jugador->apellido }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->fecha_reserva->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ substr($reserva->hora_inicio, 0, 5) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->numero_jugadores }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('reservas.show', $reserva) }}" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
                                            <a href="{{ route('reservas.edit', $reserva) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                            <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" 
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>