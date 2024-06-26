<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th  class="px-6 py-3">
                        Codigo reserva
                    </th>
                    <th  class="px-6 py-3">
                        Nombre del usuario
                    </th>
                    <th  class="px-6 py-3">
                        Codigo del vuelo
                    </th>
                </tr>
            </thead>
            <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $reserva->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reserva->usuario->name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reserva->vuelo->codigo_vuelo }}
                        </th>
                    </tr>
            </tbody>
        </table>
        <a href="{{ route('reservas.index') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Volver</x-primary-button>
        </a>
    </div>
</x-app-layout>
