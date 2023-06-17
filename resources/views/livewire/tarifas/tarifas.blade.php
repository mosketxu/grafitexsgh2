<div class="w-full border rounded-md shadow-md">
    <span class="bg-blue-500"></span>
    <span class="bg-yellow-500"></span>
    <span class="bg-green-500"></span>
    <div class="flex justify-between w-full py-1 text-white {{ $color }} rounded-t-md" style="cursor: pointer" wire:click="$toggle('visible')" >
        <div class="w-full text-center" > {{ $titulo }}</div>
        <div class="w-10 pt-1 tex-right" style="cursor: pointer" wire:click="$toggle('visible')">
            @if($visible=='1') <x-icon.circle-minus wire:click="$toggle('visible')"/> @else <x-icon.circle-plus wire:click="$toggle('visible')"/>@endif
        </div>
    </div>
    @if($visible=='1')
    <div class="text-sm">
        <div class="flex m-1">
            <div class="w-6/12">
                {{ $tarifas->appends(request()->except('page'))->links() }}
            </div>
            @if($buscar=='1')
            <div class="flex flex-row-reverse w-6/12">
                <x-input.text id="search" name="search" type="search" class="" name="search" wire:model.lazy='search'  placeholder="filtro {{ $campo }}..." />
             </div>
             @endif
        </div>
        <div class="flex w-full px-6 text-white bg-black">
            <div class="w-6/12">{{ Str::ucfirst($campo) }}</div>
            <div class="w-5/12">Tarifa</div>
            <div class="w-1/12"></div>
        </div>
        <div class="w-full overflow-y-scroll bg-grey-light " style="height: 40vh;">
            @forelse($tarifas as $detalle)
                <div class="flex items-center w-full px-6 hover:bg-gray-100">
                    <div class="w-6/12 text-sm text-gray-600">{{ ucfirst($detalle->$campo)}}</div>
                    <div class="w-5/12 mt-0.5">
                        @can('tarifa.create')
                            <input type="text" value="{{ $detalle->tarifa1 }}"
                            wire:change="changeCampo({{ $detalle }},'tarifa1',$event.target.value)"
                            class="py-1 text-sm text-gray-600 transition duration-150 border border-blue-300 rounded-md form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300"/>
                        @elsecan('tarifa.create')
                            {{ $detalle->tarifa1 }}
                            {{-- <input type="text" value="{{ $detalle->tarifa1 }}"
                                class="py-1 text-sm text-gray-600 transition duration-150 border border-blue-300 rounded-md form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300" disabled/> --}}
                        @endcan
                    </div>
                    <div class="">
                        <div class="flex items-center justify-between mt-1 space-x-3 text-right">
                            @can('tarifa.create')
                            <x-icon.edit-a href="{{ route('tarifa.edit',$detalle->id) }}" class="w-6" title="Edit"/>
                            @endcan
                            @can('tarifa.delete')
                            @if($titulo=='Tarifas materiales')
                                <form id="form_id" role="form" method="post" action="{{ route('tarifa.destroy',$detalle->id) }}">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="enlace"><x-icon.trash  class="w-5 text-red-500" title="Eliminar"/></button>
                                </form>
                            @endif
                            @endcan
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex w-full">
                    <div class="w-full">No hay datos</div>
                </div>
            @endforelse
        </div>
    </div>
    @endif
</div>
