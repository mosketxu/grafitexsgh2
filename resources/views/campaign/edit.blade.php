<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-full">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Campaña: {{ $campaign->campaign_name }}
                </h2>
            </div>
            <div class="flex flex-row-reverse w-10/12">
                @can('campaign.index')
                    @include('campaign.menu_campanya')
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('campaign.campaign')
            </div>
        </div>
    </div>
</x-app-layout>
