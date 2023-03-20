<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">Planificación de la campaña: {{ $campaign->campaign }}</h2>
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('campaign.plan.campaigntiendas')
            </div>
            <div class="m-1">
                <x-jet-button type="button" class="py-2 text-gray-800 border-gray-200 bg-gray-50 hover:text-white" onclick="location.href = '{{ route('campaign.index') }}'" color="gray" >{{ __('Volver') }}</x-jet-button>
            </div>
        </div>
    </div>
</x-app-layout>
