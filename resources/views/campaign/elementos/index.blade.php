<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-2/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Elementos de la Campaña
                </h2>
            </div>
            <div class="flex flex-row-reverse w-10/12 ">
                @can('elemento.create')
                    {{-- @include('campaign.menu_campanya_elementos') --}}
                    @include('campaign.menu_campanya')
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('campaign.elementos.elementos')
            </div>
        </div>
        <div class="pb-2 mx-2 my-2">
            <x-button.secondary  class="uppercase bg-white hover:bg-gray-200" onclick="location.href = '{{ route('campaign.index') }}'" color="gray" >{{ __('Volver') }}</x-button.secondary>
        </div>
    </div>
</x-app-layout>
