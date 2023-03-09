<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Información del usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full max-w-100 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$usuario->name}}, {{$usuario->apell}}</h5>                            </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dirección: {{$usuario->address}}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dirección: {{$usuario->rol}}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Email: {{$usuario->email}}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Password: {{$usuario->password}}</p>

                            <div class="flex items-center justify-between">
                                <a href="{{route('usuario.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>