<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-2/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Presupuestos
                </h2>
            </div>
            <div class="flex flex-row-reverse w-10/12">
                <div class="flex">
                    @can('campaign.index')
                    <div class="">
                        @include('campaign.menu_campanya')
                    </div>
                    @endcan
                    @can('presupuestos.create')
                    <div class="">
                        @livewire('campaigns.modal-presupuesto-nuevo',['campaign'=>$campaign])
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="">
                @include('campaign.presupuesto.presupuestos')
            </div>
        </div>
    </div>
</x-app-layout>
