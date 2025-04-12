<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Jugador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('jugadores.update', $jugador->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nombre') border-red-500 @enderror" value="{{ old('nombre', $jugador->nombre) }}" required>
                            @error('nombre')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                            <input type="text" name="apellido" id="apellido" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('apellido') border-red-500 @enderror" value="{{ old('apellido', $jugador->apellido) }}" required>
                            @error('apellido')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telefono') border-red-500 @enderror" value="{{ old('telefono', $jugador->telefono) }}">
                            @error('telefono')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email', $jugador->email) }}">
                            @error('email')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="fecha_nacimiento" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Nacimiento:</label>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('fecha_nacimiento') border-red-500 @enderror" value="{{ old('fecha_nacimiento', $jugador->fecha_nacimiento) }}">
                            @error('fecha_nacimiento')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="posicion" class="block text-gray-700 text-sm font-bold mb-2">Posición:</label>
                            <select name="posicion" id="posicion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('posicion') border-red-500 @enderror">
                                <option value="">Seleccionar posición</option>
                                <option value="Portero" {{ old('posicion', $jugador->posicion) == 'Portero' ? 'selected' : '' }}>Portero</option>
                                <option value="Defensa" {{ old('posicion', $jugador->posicion) == 'Defensa' ? 'selected' : '' }}>Defensa</option>
                                <option value="Centrocampista" {{ old('posicion', $jugador->posicion) == 'Centrocampista' ? 'selected' : '' }}>Centrocampista</option>
                                <option value="Delantero" {{ old('posicion', $jugador->posicion) == 'Delantero' ? 'selected' : '' }}>Delantero</option>
                            </select>
                            @error('posicion')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="equipo_id" class="block text-gray-700 text-sm font-bold mb-2">Equipo:</label>
                            <select name="equipo_id" id="equipo_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('equipo_id') border-red-500 @enderror">
                                <option value="">Seleccionar equipo</option>
                                @foreach($equipos as $equipo)
                                    <option value="{{ $equipo->id }}" {{ old('equipo_id', $jugador->equipo_id) == $equipo->id ? 'selected' : '' }}>{{ $equipo->nombre }}</option>
                                @endforeach
                            </select>
                            @error('equipo_id')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                            <select name="estado" id="estado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('estado') border-red-500 @enderror">
                                <option value="1" {{ old('estado', $jugador->estado) == 1 ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ old('estado', $jugador->estado) == 0 ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estado')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Actualizar
                            </button>
                            <a href="{{ route('jugadores.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>