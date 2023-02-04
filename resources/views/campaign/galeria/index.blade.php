<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-2/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Galeria de la Campaña
                </h2>
            </div>
            @can('elemento.create')
            <div class="flex flex-row-reverse w-8/12 ">
                @include('campaign.menu_campanya')
            </div>
            <div class="flex flex-row-reverse w-2/12 ">
                <form method="GET" action="{{route('campaign.galeria',$campaign) }}">
                    <x-input.text type="search" id="busca" name="busca"  class="" value='{{$busqueda}}' placeholder="Búsqueda..."/>
                </form>
            </div>
            @endcan
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class=" bg-white shadow-xl sm:rounded-lg">
                @include('campaign.galeria.imagenes')
            </div>
        </div>
        <div class="pb-2 mx-2 my-2">
            <x-button.secondary  class="uppercase bg-white hover:bg-gray-200" onclick="location.href = '{{ route('campaign.index') }}'" color="gray" >{{ __('Volver') }}</x-button.secondary>
        </div>
    </div>
</x-app-layout>


@push('scriptchosen')

<script>

</script>

@endpush
