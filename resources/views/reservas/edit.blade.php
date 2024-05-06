<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('reservas.update', ['reserva' => $reserva]) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="user_id" class="block font-medium text-sm text-gray-700">Usuario</label>
                <select id="user_id" name="user_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500 focus:shadow-outline">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label for="vuelo_id" class="block font-medium text-sm text-gray-700">Vuelo</label>
                <select id="vuelo_id" name="vuelo_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500 focus:shadow-outline">
                    @foreach($vuelos as $vuelo)
                        <option value="{{ $vuelo->id }}">{{ $vuelo->codigo_vuelo }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('vuelo_id')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('reservas.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                    </x-secondary-button>
                </a>
                <x-primary-button class="ms-4">
                    Editar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
