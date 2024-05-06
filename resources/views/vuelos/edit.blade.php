<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('videojuegos.update', ['videojuego' => $videojuego]) }}">
            @csrf
            @method('PUT')

            <!-- Código del vuelo -->
            <div class="mb-4">
                <x-label for="codigo_vuelo" :value="'Código del vuelo'" />
                <x-input id="codigo_vuelo" class="block mt-1 w-full" type="text" name="codigo_vuelo" :value="old('codigo_vuelo')" autofocus autocomplete="codigo_vuelo" />
                <x-input-error :messages="$errors->get('codigo_vuelo')" class="mt-2" />
            </div>

            <!-- Origen -->
            <div class="mb-4">
                <x-label for="origen_id" :value="'Origen'" />
                <select id="origen_id" name="origen_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500 focus:shadow-outline">
                    @foreach($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}">{{ $aeropuerto->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('origen_id')" class="mt-2" />
            </div>

            <!-- Destino -->
            <div class="mb-4">
                <x-label for="destino_id" :value="'Destino'" />
                <select id="de<!-- Código del vuelo -->
                    <div class="mb-4">
                        <x-label for="codigo_vuelo" :value="'Código del vuelo'" />
                        <x-input id="cstino_id" name="destino_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500 focus:shadow-outline">
                    @foreach($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}">{{ $aeropuerto->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('destino_id')" class="mt-2" />
            </div>

            <!-- Compañía -->
            <div class="mb-4">
                <x-label for="compania_id" :value="'Compañía'" />
                <select id="compania_id" name="compania_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500 focus:shadow-outline">
                    @foreach($companias as $compania)
                        <option value="{{ $compania->id }}">{{ $compania->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('compania_id')" class="mt-2" />
            </div>

            <!-- Hora de salida -->
            <div class="mb-4">
                <x-label for="salida" :value="'Hora de salida'" />
                <x-input id="salida" class="block mt-1 w-full" type="datetime-local" name="salida" :value="old('salida')" />
                <x-input-error :messages="$errors->get('salida')" class="mt-2" />
            </div>

            <!-- Hora de llegada -->
            <div class="mb-4">
                <x-label for="llegada" :value="'Hora de llegada'" />
                <x-input id="llegada" class="block mt-1 w-full" type="datetime-local" name="llegada" :value="old('llegada')" />
                <x-input-error :messages="$errors->get('llegada')" class="mt-2" />
            </div>

            <!-- Plazas -->
            <div class="mb-4">
                <x-label for="plazas" :value="'Plazas'" />
                <x-input id="plazas" class="block mt-1 w-full" type="number" name="plazas" :value="old('plazas')" />
                <x-input-error :messages="$errors->get('plazas')" class="mt-2" />
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <x-label for="precio" :value="'Precio'" />
                <x-input id="precio" class="block mt-1 w-full" type="number" step="0.01" name="precio" :value="old('precio')" />
                <x-input-error :messages="$errors->get('precio')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('videojuegos.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
