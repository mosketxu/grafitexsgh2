<div class="flex justify-between space-x-2 text-sm font-light">
    <div class="flex w-4/12 text-sm">
        <div class="w-full">
            <label class="px-1 text-sm text-gray-600">
                Montador
            </label>
            <div class="flex">
                <input type="search" wire:model="search" class="w-full py-1 text-sm border border-blue-100 rounded-lg" placeholder="Búsqueda por nombre" autofocus/>
                @if($search!='')
                    <x-icon.filter-slash-a wire:click="$set('search', '')" class="pb-1" title="reset filter"/>
                @endif
            </div>
        </div>
    </div>
    <div class="flex w-3/12 ">
        <div class="w-full">
            <label class="px-1 text-sm text-gray-600">
                Localidad
            </label>
            <div class="flex">
                <input type="search" wire:model="filtrolocalidad" class="w-full py-1 text-sm border border-blue-100 rounded-lg" placeholder="Búsqueda por localidad" autofocus/>
                @if($filtrolocalidad!='')
                    <x-icon.filter-slash-a wire:click="$set('filtrolocalidad', '')" class="pb-1" title="reset filter"/>
                @endif
            </div>
        </div>
    </div>
    <div class="flex w-3/12 ">
        <div class="w-full">
            <label class="px-1 text-sm text-gray-600">
                Provincia
            </label>
            <div class="flex">
                <select wire:model="filtroprovincia"
                    class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                        <option value="">-- selecciona --</option>
                        @foreach ($provincias as $provincia )
                        <option value={{ $provincia->id}}>{{ $provincia->provincia }}</option>
                        @endforeach
                </select>
                @if($filtroprovincia!='')
                    <x-icon.filter-slash-a wire:click="$set('filtroprovincia', '')" class="pb-1" title="reset filter"/>
                @endif
            </div>
        </div>
    </div>
    <div class="flex w-2/12">
        <div class="w-full">
            <label class="px-1 text-sm text-gray-600">
                Area
            </label>
            <div class="flex">
                <select wire:model="filtroarea"
                    class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                    <option value="">-- selecciona --</option>
                    @foreach ($areas as $area )
                    <option value={{ $area->id}}>{{ $area->area }}</option>
                    @endforeach
                </select>
                @if($filtroarea!='')
                <x-icon.filter-slash-a wire:click="$set('filtroarea', '')" class="pb-1" title="reset filter" />
                @endif
            </div>
        </div>
    </div>

    {{-- <div class="flex flex-row-reverse w-full">
        <div class="mt-3">
            <x-button.button  onclick="location.href = '{{ route('entidad.create') }}'" color="blue">Nuevo</x-button.button>
        </div>
    </div> --}}
</div>
