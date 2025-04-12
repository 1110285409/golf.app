<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Jugador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('jugadores.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                            <input type="text" name="nombre" id="nombre"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('nombre') border-red-500 @enderror"
                                   value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                            <input type="text" name="apellido" id="apellido"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('apellido') border-red-500 @enderror"
                                   value="{{ old('apellido') }}" required>
                            @error('apellido')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('telefono') border-red-500 @enderror"
                                   value="{{ old('telefono') }}" required>
                            @error('telefono')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('email') border-red-500 @enderror"
                                   value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                            <input type="text" name="direccion" id="direccion"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('direccion') border-red-500 @enderror"
                                   value="{{ old('direccion') }}" required>
                            @error('direccion')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="handicap" class="block text-gray-700 text-sm font-bold mb-2">Handicap:</label>
                            <input type="number" name="handicap" id="handicap" step="0.1"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('handicap') border-red-500 @enderror"
                                   value="{{ old('handicap') }}" min="0">
                            @error('handicap')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Guardar
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