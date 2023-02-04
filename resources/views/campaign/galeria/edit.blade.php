<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-4/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Edición de imágenes de la Campaña
                </h2>
            </div>
            @can('elemento.create')
            <div class="flex flex-row-reverse w-8/12 ">
                @include('campaign.menu_campanya')
            </div>
            @endcan
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class=" bg-white shadow-xl sm:rounded-lg">
                @include('campaign.galeria.imagen')
            </div>
        </div>
    </div>
</x-app-layout>


@push('scriptchosen')

<script>

</script>

@endpush
