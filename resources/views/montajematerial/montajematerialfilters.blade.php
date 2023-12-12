<div class="flex justify-between space-x-2 text-sm font-light">
    <div class="flex w-4/12 text-sm">
        <div class="w-full">
            <label class="px-1 text-sm text-gray-600">
                Tipo Material montaje
            </label>
            <div class="flex">
                <input type="search" wire:model="search" class="w-full py-1 text-sm border border-blue-100 rounded-lg" placeholder="Búsqueda por nombre" autofocus/>
                @if($search!='')
                    <x-icon.filter-slash-a wire:click="$set('search', '')" class="pb-1" title="reset filter"/>
                @endif
            </div>
        </div>
    </div>

    <div class="flex flex-row-reverse w-full">
        {{-- <div class="mt-3">
            <x-button.button  onclick="location.href = '{{ route('producto.create') }}'" color="blue">Nuevo</x-button.button>
        </div> --}}
    </div>
</div>
