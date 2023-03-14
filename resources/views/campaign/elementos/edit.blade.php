<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-3/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Elemento de la Campaña
                </h2>
            </div>
            <div class="flex flex-row-reverse w-7/12 ">
                @can('elemento.create')
                    {{-- @include('campaign.menu_campanya_elementos') --}}
                    @include('campaign.menu_campanya')
                @endcan
            </div>
            <div class="flex flex-row-reverse w-2/12 ">
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('campaign.elementos.elemento')
            </div>
        </div>
        {{-- <div class="pb-2 mx-2 my-2">
            <x-button.secondary  class="uppercase bg-white hover:bg-gray-200" onclick="location.href = '{{ route('campaign.elementos', $campaign->id ) }}'" color="gray" >{{ __('Volver') }}</x-button.secondary>
        </div> --}}
    </div>
</x-app-layout>
