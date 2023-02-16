<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-2xl font-semibold leading-tight text-gray-800">Elementos de la campaña <span class="text-blue-500">{{ $campaign->campaign_name }}</span> para la tienda <span class="text-green-500"> {{ $store->name }} </span></h2>
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('tienda.campaignelementos')
            </div>
        </div>
        <div class="">
            <x-button.secondary  class="py-1 mt-1 uppercase bg-white hover:bg-gray-200" onclick="location.href = '{{ route('tienda.controlstores',$campaign->id) }}'" color="gray" >{{ __('Volver') }}</x-button.secondary>
        </div>
    </div>
</x-app-layout>
