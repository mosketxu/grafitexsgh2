<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-2/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Estadísticas Campaña
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
                @include('campaign.conteos')
            </div>
        </div>
    </div>
</x-app-layout>
