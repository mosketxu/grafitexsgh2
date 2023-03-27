<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-9/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">Planificacion de la campaña: {{ $camptienda->campaign->campaign_name }}</h2>
            </div>
            <div class="flex-row-reverse w-3/12">
                @can('montador.update')
                <form action="{{ route('montador.updateestadomontaje',[$camptienda,$ruta]) }}"  method="post" class="flex items-center w-full">
                    @csrf
                    @method('PUT')
                    <x-jet-label class="mr-2">Estado</x-jet-label>
                    <x-select  selectname="estadomontaje" class="w-full py-1 text-sm border-blue-300" id="estadomontaje"  >
                        <option value="0" {{ $camptienda->estadomontaje== '0' ? 'selected' : '' }}>Sin iniciar</option>
                        <option value="1" {{ $camptienda->estadomontaje== '1' ? 'selected' : '' }}>En curso</option>
                        <option value="2" {{ $camptienda->estadomontaje== '2' ? 'selected' : '' }}>Finalizado</option>
                    </x-select>
                </form>
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('campaign.plan.campaigntienda')
            </div>
        </div>
    </div>
</x-app-layout>
