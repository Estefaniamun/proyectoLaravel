<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Compra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('compra.edit', ['id' => $compra->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="productos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona el id del producto</label>
                            <select id="productos"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($productos as $p)
                                    <option>{{$p->id}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="usuarios"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona el id del usuario</label>
                            <select id="usuarios"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($usuarios as $u)
                                    <option>{{$u->id}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="number" name="precio" id="precio"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ $compra->precio }}" />
                            <label for="precio"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Precio</label>
                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar
                            compra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
