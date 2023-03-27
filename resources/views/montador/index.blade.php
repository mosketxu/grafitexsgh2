<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-8/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">Tiendas asignadas a: {{ Auth()->user()->name }}</h2>
            </div>
            <div class="flex-row-reverse w-4/12">
                <form action="{{ route('montador.index') }}"  method="post" class="flex items-center w-full">
                    @csrf
                    @method('get')
                    <x-select  selectname="filtroestadomontaje" class="w-full py-1 text-sm text-left border-blue-300" id="filtroestadomontaje"  >
                        <option value="t" {{ $filtroestadomontaje== 't' ? 'selected' : '' }}>Todos</option>
                        <option value="0" {{ $filtroestadomontaje== '0' ? 'selected' : '' }}>Sin iniciar</option>
                        <option value="1" {{ $filtroestadomontaje== '1' ? 'selected' : '' }}>En curso</option>
                        <option value="2" {{ $filtroestadomontaje== '2' ? 'selected' : '' }}>Finalizado</option>
                        <option value="3" {{ $filtroestadomontaje== '3' ? 'selected' : '' }}>No finalizados</option>
                    </x-select>
                </form>
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('montador.montadortiendas')
            </div>
            {{-- <div class="m-1">
                <x-jet-button type="button" class="py-2 text-gray-800 border-gray-200 bg-gray-50 hover:text-white" onclick="location.href = '{{ route('campaign.index') }}'" color="gray" >{{ __('Volver') }}</x-jet-button>
            </div> --}}
        </div>
    </div>
</x-app-layout>
