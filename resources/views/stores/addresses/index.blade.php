<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Direcciones de las tiendas
                </h2>
            </div>
            <div class="flex flex-row-reverse w-full">
                @can('store.create')
                <nav x-data="{ open: false }" class="rounded-md ">
                    <div class="px-2 mx-auto sm:px-2 lg:px-2">
                        <div class="flex justify-between ">
                            <div class="flex text-xs">
                                <div class="hidden space-x-2 sm:-my-px sm:m-2 sm:flex">
                                    <x-button.button  class="py-2" onclick="location.href = '{{ route('store.index') }}'" color="green" >{{ __('Stores') }}</x-button.button>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('stores.addresses.addresses')
            </div>
        </div>
    </div>
</x-app-layout>

