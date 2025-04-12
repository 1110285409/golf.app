<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Campo de Golf') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('campos.update', $campo) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                            <input type="text" name="nombre" id="nombre"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('nombre') border-red-500 @enderror"
                                   value="{{ old('nombre', $campo->nombre) }}" required>
                            @error('nombre')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="ubicacion" class="block text-gray-700 text-sm font-bold mb-2">Ubicación:</label>
                            <input type="text" name="ubicacion" id="ubicacion"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('ubicacion') border-red-500 @enderror"
                                   value="{{ old('ubicacion', $campo->ubicacion) }}" required>
                            @error('ubicacion')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="numero_hoyos" class="block text-gray-700 text-sm font-bold mb-2">Número de hoyos:</label>
                            <input type="number" name="numero_hoyos" id="numero_hoyos"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('numero_hoyos') border-red-500 @enderror"
                                   value="{{ old('numero_hoyos', $campo->numero_hoyos) }}" required min="1">
                            @error('numero_hoyos')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tipo" class="block text-gray-700 text-sm font-bold mb-2">Tipo:</label>
                            <select name="tipo" id="tipo"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('tipo') border-red-500 @enderror" required>
                                <option value="">Seleccione</option>
                                <option value="público" {{ old('tipo', $campo->tipo) == 'público' ? 'selected' : '' }}>Público</option>
                                <option value="privado" {{ old('tipo', $campo->tipo) == 'privado' ? 'selected' : '' }}>Privado</option>
                            </select>
                            @error('tipo')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tarifa" class="block text-gray-700 text-sm font-bold mb-2">Tarifa (€):</label>
                            <input type="number" name="tarifa" id="tarifa" step="0.01"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                                   @error('tarifa') border-red-500 @enderror"
                                   value="{{ old('tarifa', $campo->tarifa) }}" required min="0">
                            @error('tarifa')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Actualizar
                            </button>
                            <a href="{{ route('campos.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>