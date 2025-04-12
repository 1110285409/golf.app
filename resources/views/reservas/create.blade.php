<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Reserva') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('reservas.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="campo_id" class="block text-gray-700 text-sm font-bold mb-2">Campo:</label>
                            <select name="campo_id" id="campo_id"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('campo_id') border-red-500 @enderror" required>
                                <option value="">Seleccione un campo</option>
                                @foreach($campos as $campo)
                                    <option value="{{ $campo->id }}" {{ old('campo_id') == $campo->id ? 'selected' : '' }}>
                                        {{ $campo->nombre }} - {{ $campo->ubicacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('campo_id')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="jugador_id" class="block text-gray-700 text-sm font-bold mb-2">Jugador:</label>
                            <select name="jugador_id" id="jugador_id"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('jugador_id') border-red-500 @enderror" required>
                                <option value="">Seleccione un jugador</option>
                                @foreach($jugadores as $jugador)
                                    <option value="{{ $jugador->id }}" {{ old('jugador_id') == $jugador->id ? 'selected' : '' }}>
                                        {{ $jugador->nombre }} {{ $jugador->apellido }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jugador_id')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="fecha_reserva" class="block text-gray-700 text-sm font-bold mb-2">Fecha:</label>
                            <input type="date" name="fecha_reserva" id="fecha_reserva"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('fecha_reserva') border-red-500 @enderror"
                                   value="{{ old('fecha_reserva') }}" required>
                            @error('fecha_reserva')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="hora_inicio" class="block text-gray-700 text-sm font-bold mb-2">Hora de inicio:</label>
                            <input type="time" name="hora_inicio" id="hora_inicio"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('hora_inicio') border-red-500 @enderror"
                                   value="{{ old('hora_inicio') }}" required>
                            @error('hora_inicio')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="duracion" class="block text-gray-700 text-sm font-bold mb-2">Duración (minutos):</label>
                            <input type="number" name="duracion" id="duracion"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('duracion') border-red-500 @enderror"
                                   value="{{ old('duracion', 120) }}" required min="30" step="30">
                            @error('duracion')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="numero_jugadores" class="block text-gray-700 text-sm font-bold mb-2">Número de jugadores:</label>
                            <input type="number" name="numero_jugadores" id="numero_jugadores"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('numero_jugadores') border-red-500 @enderror"
                                   value="{{ old('numero_jugadores', 1) }}" required min="1" max="4">
                            @error('numero_jugadores')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Guardar
                            </button>
                            <a href="{{ route('reservas.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>