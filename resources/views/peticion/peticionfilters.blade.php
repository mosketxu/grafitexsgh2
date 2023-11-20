<div class="flex justify-between space-x-2 text-sm font-light">
    <div class="flex w-4/12 text-sm">
        <div class="w-full">
            <label class="px-1 text-sm text-gray-600">
                Peticion
            </label>
            <div class="flex">
                <input type="search" wire:model="search" class="w-full py-1 text-sm border border-blue-100 rounded-lg" placeholder="Búsqueda por nombre" autofocus/>
                @if($search!='')
                    <x-icon.filter-slash-a wire:click="$set('search', '')" class="pb-1" title="reset filter"/>
                @endif
            </div>
        </div>
    </div>
    <div class="flex w-2/12">
        <div class="w-full">
            <label class="px-1 text-sm text-gray-600">
                Estado
            </label>
            <div class="flex">
                <select wire:model="filtroestado"
                    class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                    <option value="">-- selecciona --</option>
                    @foreach ($estados as $estado)
                        <option value={{ $estado->id }}>{{ $estado->estadopeticion }}</option>
                    @endforeach
                </select>
                @if($filtroestado!='')
                <x-icon.filter-slash-a wire:click="$set('filtroestado', '')" class="pb-1" title="reset filter" />
                @endif
            </div>
        </div>
    </div>
    <div class="flex w-2/12">
        <div class="w-full">
            <label class="px-1 text-sm text-gray-600">
                Solicitada por
            </label>
            <div class="flex">
            @if(!Auth::user()->hasRole('tienda'))
                <select wire:model="filtropeticionario"
                    class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                    <option value="">-- selecciona --</option>
                    @foreach ($peticionarios as $peticionario )
                        <option value={{ $peticionario->id }}>{{ $peticionario->name }}</option>
                    @endforeach
                </select>
                @if($filtropeticionario!='')
                <x-icon.filter-slash-a wire:click="$set('filtropeticionario', '')" class="pb-1" title="reset filter" />
                @endif
            @else
                <input type="text" class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none" value={{ Auth::user()->name }} disabled>
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
