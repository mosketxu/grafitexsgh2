<div class="flex w-full pt-2 pb-0 pl-2 mt-2 space-x-1 text-sm font-bold tracking-tighter text-black ">
    <div class="flex w-4/12 text-sm mx-1">
        <input type="search" wire:model="search" class="w-full py-1 text-sm border border-blue-100 rounded-lg" placeholder="Búsqueda por nombre" autofocus/>
    </div>
    <div class="flex w-1/12 text-sm mx-1">
        <div class="flex">
            <select wire:model="filtrotiendatipo"
                class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                <option value="">-- selecciona --</option>
                @foreach ($ttipos as $tipo )
                <option value="{{ $tipo->id }}">{{ $tipo->tiendatipo }}</option>
                @endforeach
            </select>
            @if($filtrotiendatipo!='')<x-icon.filter-slash-a wire:click="$set('filtrotiendatipo', '')" class="pb-1" title="reset filter"/>@endif
        </div>
    </div>
    <div class="flex w-1/12 text-sm mx-1">
        <div class="flex">
            <select wire:model="filtroproductocategoria"
                class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                <option value="">-- selecciona --</option>
                @foreach ($pcategorias as $productocategoria )
                    <option value="{{ $productocategoria->id }}">{{ $productocategoria->productocategoria }}</option>
                @endforeach
            </select>
            @if($filtrotiendatipo!='')<x-icon.filter-slash-a wire:click="$set('filtrotiendatipo', '')" class="pb-1" title="reset filter"/>@endif
        </div>
    </div>
    <div class="flex w-4/12 text-sm mx-1">
        <input type="search" wire:model="filtrodescripcion" class="w-full py-1 text-sm border border-blue-100 rounded-lg" placeholder="Búsqueda por descripcion" autofocus/>
    </div>
    <div class="flex w-1/12 text-sm mx-1">
        <div class="flex">
            <select wire:model="filtroestado"
                class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                <option value="">-- selecciona --</option>
                <option value='1'>{{ 'Activo' }}</option>
                <option value='0'>{{ 'Inactivo' }}</option>
            </select>
            @if($filtroestado!='')<x-icon.filter-slash-a wire:click="$set('filtroestado', '')" class="pb-1" title="reset filter" />@endif
        </div>
    </div>

    <div class="flex w-1/12 text-sm mx-1">
    </div>

</div>

