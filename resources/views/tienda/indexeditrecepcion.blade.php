<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Tienda: <span class="text-blue-600"> {{ $store->id }} - {{ $store->name }} </span>. Control recepción de la campaña: <span class="text-green-600"> {{ $campaign->campaign_name }} </span>
                </h2>
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('tienda.editrecepcion')
            </div>
        </div>
        <div class="">
            {{-- <x-jet-button type="button" class="py-2 mt-1 text-gray-800 border-gray-200 bg-gray-50" onclick="location.href = '{{ route('tienda.index') }}'" color="gray" >{{ __('Volver') }}</x-jet-button> --}}
            @if(Auth::user()->hasRole('tienda'))
            <x-button.secondary type="button" class="py-2 mt-1 text-gray-800 border-gray-200 bg-gray-50" onclick="location.href = '{{ route('tienda.index') }}'" color="gray" >{{ __('Volver') }}</x-button.secondary>
            @else
            <x-button.secondary type="button" class="py-2 mt-1 text-gray-800 border-gray-200 bg-gray-50" onclick="location.href = '{{ route('tienda.controlstores',$campaign) }}'" color="gray" >{{ __('Volver') }}</x-button.secondary>
            @endif
        </div>

    </div>
</x-app-layout>
