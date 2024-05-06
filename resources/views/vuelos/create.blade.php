<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form action="{{ route('vuelos.store') }}" method="POST">
            @csrf

            <!-- Código del vuelo -->
            <div class="mb-4">
                <label for="codigo_vuelo" class="block font-medium text-sm text-gray-700">Código del vuelo</label>
                <input id="codigo_vuelo" class="block mt-1 w-full" type="text" name="codigo_vuelo" value="{{ old('codigo_vuelo') }}" autofocus autocomplete="codigo_vuelo" />
                @error('codigo_vuelo')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Origen -->
            <div class="mb-4">
                <label for="origen_id" class="block font-medium text-sm text-gray-700">Origen</label>
                <select id="origen_id" name="origen_id" class="block w-full mt-1">
                    @foreach($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}">{{ $aeropuerto->nombre }}</option>
                    @endforeach
                </select>
                @error('origen_id')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Destino -->
            <div class="mb-4">
                <label for="destino_id" class="block font-medium text-sm text-gray-700">Destino</label>
                <select id="destino_id" name="destino_id" class="block w-full mt-1">
                    @foreach($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}">{{ $aeropuerto->nombre }}</option>
                    @endforeach
                </select>
                @error('destino_id')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Compañía -->
            <div class="mb-4">
                <label for="compania_id" class="block font-medium text-sm text-gray-700">Compañía</label>
                <select id="compania_id" name="compania_id" class="block w-full mt-1">
                    @foreach($companias as $compania)
                        <option value="{{ $compania->id }}">{{ $compania->nombre }}</option>
                    @endforeach
                </select>
                @error('compania_id')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Hora de salida -->
            <div class="mb-4">
                <label for="salida" class="block font-medium text-sm text-gray-700">Hora de salida</label>
                <input id="salida" class="block mt-1 w-full" type="datetime-local" name="salida" value="{{ old('salida') }}" />
                @error('salida')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Hora de llegada -->
            <div class="mb-4">
                <label for="llegada" class="block font-medium text-sm text-gray-700">Hora de llegada</label>
                <input id="llegada" class="block mt-1 w-full" type="datetime-local" name="llegada" value="{{ old('llegada') }}" />
                @error('llegada')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Plazas -->
            <div class="mb-4">
                <label for="plazas" class="block font-medium text-sm text-gray-700">Plazas</label>
                <input id="plazas" class="block mt-1 w-full" type="number" name="plazas" value="{{ old('plazas') }}" />
                @error('plazas')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <label for="precio" class="block font-medium text-sm text-gray-700">Precio</label>
                <input id="precio" class="block mt-1 w-full" type="number" step="0.01" name="precio" value="{{ old('precio') }}" />
                @error('precio')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('vuelos.index') }}" class="ms-4">Volver</a>
                <button type="submit" class="ml-4 px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Insertar</button>
            </div>
        </form>
    </div>
</x-app-layout>
