<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Información del producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="#"
                        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="rounded-t-lg"
                            src="{{asset($url.$producto->id)}}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Nombre: {{$producto->nombre}}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Descripcion: {{$producto->descripcion}}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Fecha Caducidad: {{$producto->fecha_caducidad}}</p>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
