<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('vuelos.update', ['vuelo' => $vuelo]) }}">
            @csrf
            @method('PUT')

            <!-- Código del vuelo -->
            <div class="mb-4">
                <label for="codigo_vuelo" class="block font-medium text-sm text-gray-700">Código del vuelo</label>
                <input id="codigo_vuelo" class="block mt-1 w-full" type="text" name="codigo_vuelo" value="{{ $vuelo->codigo_vuelo }}" autofocus autocomplete="codigo_vuelo" />
                <x-input-error :messages="$errors->get('codigo_vuelo')" class="mt-2" />
            </div>

            <!-- Origen -->
            <div class="mb-4">
                <label for="origen_id" class="block font-medium text-sm text-gray-700">Origen</label>
                <select id="origen_id" name="origen_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500 focus:shadow-outline">
                    @foreach($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}" {{ $vuelo->origen_id == $aeropuerto->id ? 'selected' : '' }}>{{ $aeropuerto->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('origen_id')" class="mt-2" />
            </div>

            <!-- Destino -->
            <div class="mb-4">
                <label for="destino_id" class="block font-medium text-sm text-gray-700">Destino</label>
                <select id="destino_id" name="destino_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500 focus:shadow-outline">
                    @foreach($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}" {{ $vuelo->destino_id == $aeropuerto->id ? 'selected' : '' }}>{{ $aeropuerto->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('destino_id')" class="mt-2" />
            </div>

            <!-- Compañía -->
            <div class="mb-4">
                <label for="compania_id" class="block font-medium text-sm text-gray-700">Compañía</label>
                <select id="compania_id" name="compania_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500 focus:shadow-outline">
                    @foreach($companias as $compania)
                        <option value="{{ $compania->id }}" {{ $vuelo->compania_id == $compania->id ? 'selected' : '' }}>{{ $compania->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('compania_id')" class="mt-2" />
            </div>

            <!-- Hora de salida -->
            <div class="mb-4">
                <label for="salida" class="block font-medium text-sm text-gray-700">Hora de salida</label>
                <input id="salida" class="block mt-1 w-full" type="datetime-local" name="salida" value="{{ date('Y-m-d\TH:i', strtotime($vuelo->salida)) }}" />
                <x-input-error :messages="$errors->get('salida')" class="mt-2" />
            </div>

            <!-- Hora de llegada -->
            <div class="mb-4">
                <label for="llegada" class="block font-medium text-sm text-gray-700">Hora de llegada</label>
                <input id="llegada" class="block mt-1 w-full" type="datetime-local" name="llegada" value="{{ date('Y-m-d\TH:i', strtotime($vuelo->llegada)) }}" />
                <x-input-error :messages="$errors->get('llegada')" class="mt-2" />
            </div>

            <!-- Plazas -->
            <div class="mb-4">
                <label for="plazas" class="block font-medium text-sm text-gray-700">Plazas</label>
                <input id="plazas" class="block mt-1 w-full" type="number" name="plazas" value="{{ $vuelo->plazas }}" />
                <x-input-error :messages="$errors->get('plazas')" class="mt-2" />
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <label for="precio" class="block font-medium text-sm text-gray-700">Precio</label>
                <input id="precio" class="block mt-1 w-full" type="number" step="0.01" name="precio" value="{{ $vuelo->precio }}" />
                <x-input-error :messages="$errors->get('precio')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('vuelos.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Editar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
