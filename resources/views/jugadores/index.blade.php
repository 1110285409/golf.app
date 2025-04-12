<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Jugadores') }}
            </h2>
            <a href="{{ route('jugadores.create') }}" 
               class="!bg-primary-500 hover:!bg-primary-600 text-black font-semibold py-2 px-4 rounded-lg shadow-md transition-colors duration-300">
                + Nuevo Jugador
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="!bg-success-100 border !border-success-500 !text-success-700 px-4 py-3 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($jugadores->isEmpty())
                        <p class="text-gray-500 italic">No hay jugadores registrados.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="!bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Handicap</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($jugadores as $jugador)
                                    <tr class="hover:!bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                            {{ $jugador->nombre }} {{ $jugador->apellido }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $jugador->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $jugador->telefono }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $jugador->handicap }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                            <a href="{{ route('jugadores.show', $jugador) }}" 
                                               class="!bg-secondary-500 hover:!bg-secondary-600 text-black px-3 py-1 rounded shadow">
                                                Ver
                                            </a>
                                            <a href="{{ route('jugadores.edit', $jugador) }}" 
                                               class="!bg-success-500 hover:!bg-success-600 text-black px-3 py-1 rounded shadow">
                                                Editar
                                            </a>
                                            <form action="{{ route('jugadores.destroy', $jugador) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="!bg-danger-500 hover:!bg-danger-600 text-black px-3 py-1 rounded shadow"
                                                        onclick="return confirm('¿Eliminar jugador?')">
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