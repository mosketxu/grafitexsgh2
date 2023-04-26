<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-4/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Cotización del presupuestos
                </h2>
            </div>
            <div class="flex flex-row-reverse w-8/12">
                <div class="flex">
                    {{-- @can('presupuestos.index')
                    <div class="">
                        @include('campaign.presupuesto.menu_cotizacion')
                    </div>
                    @endcan --}}
                </div>
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="">
                @include('campaign.presupuesto.elementosfamilia')
            </div>
        </div>
        <div class="flex justify-between m-2">
            <div class="">
                <x-jet-button type="button" class="py-2 text-gray-800 border-gray-200 bg-gray-50" onclick="location.href = '{{ route('campaign.presupuesto.cotizacion',$presupuesto) }}'" color="gray" >{{ __('Volver') }}</x-jet-button>
            </div>
            <div class="flex flex-col-reverse">
                {{ $elementos->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
