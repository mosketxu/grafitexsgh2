<div class="w-full border rounded-md shadow-md">
    <div class="flex justify-between w-full py-1 text-white bg-green-400 rounded-t-md" style="cursor: pointer" wire:click="$toggle('visible')" >
        <div class="w-full text-center" > {{ $titulo }}  {{number_format($totalExtras,2,',','.')}}</div>
        <div class="w-10 pt-1 tex-right" style="cursor: pointer" wire:click="$toggle('visible')">
            @if($visible=='1') <x-icon.circle-minus wire:click="$toggle('visible')"/> @else <x-icon.circle-plus wire:click="$toggle('visible')"/>@endif
        </div>
    </div>
    @if($visible=='1')
    <div class="text-sm">
        <div class="">
            @include('errores')
        </div>
        <div class="flex w-full px-6 space-x-3 text-white bg-black">
            <div class="w-3/12">Extra</div>
            <div class="w-1/12">Zona</div>
            <div class="w-1/12 pr-6 text-right">Uds</div>
            <div class="w-1/12 pr-6 text-right">€/ud.</div>
            <div class="w-1/12 pr-6 text-right">Total</div>
            <div class="w-4/12 text-left">Obs.</div>
            <div class="w-1/12"></div>
        </div>
        <div class="items-center w-full overflow-y-scroll bg-grey-light" style="height: 40vh;">
            @forelse($extras as $detalle)
                {{-- <form id="{{ $extra->id }}extra" method="post" action="{{ route('campaign.presupuesto.extra.delete',$extra->id) }}">
                    <input type="hidden" name="_tokenExtra{{$extra->id}}" value="{{ csrf_token()}}" id="tokenExtra{{$extra->id}}">
                    @csrf
                    @method('DELETE') --}}
                <div wire:loading.class.delay="opacity-50" class="flex items-center w-full px-6 space-x-3 ">
                    <div class="w-3/12">
                        <x-input.text  type="text" value="{{$detalle->concepto}}"
                            class="py-1 text-sm border-none shadow-none" name="concepto"
                            wire:change="changeCampo({{ $detalle }},'concepto',$event.target.value)"/>
                    </div>
                    <div class="w-1/12">
                        <x-select selectname="zona" type="text"
                            class="w-full py-1.5 border-none shadow-none"
                            wire:change="changeCampo({{ $detalle }},'zona',$event.target.value)">
                            <option value="ES" {{ $detalle->zona=='ES' ? 'selected' : '' }}>ES</option>
                            <option value="CA" {{ $detalle->zona=='CA' ? 'selected' : '' }}>CA</option>
                            <option value="PT" {{ $detalle->zona=='PT' ? 'selected' : '' }}>PT</option>
                        </x-select>
                    </div>
                    <div class="w-1/12">
                        <x-input.text type="number" name="unidades" value="{{$detalle->unidades}}"
                            class="py-1 text-sm text-right border-none shadow-none"
                            wire:change="changeCampo({{ $detalle }},'unidades',$event.target.value)"/>
                    </div>
                    <div class="w-1/12">
                        <x-input.text type="text" name="preciounidad" value="{{number_format($detalle->preciounidad,2,',','.')}}"
                            class="py-1 text-sm text-right border-none shadow-none"
                            wire:change="changeCampo({{ $detalle }},'preciounidad',$event.target.value)"/>
                    </div>
                    <div class="w-1/12">
                        <x-input.text type="text" name="total" value="{{ number_format($detalle->total, 2, ',', '.') }}"
                        class="py-1 text-sm text-right bg-blue-200 border-none shadow-none"
                        disabled/>
                    </div>
                    <div class="w-4/12">
                        <x-input.text type="text" name="observaciones" value="{{$detalle->observaciones}}"
                        class="py-1 text-sm border-none shadow-none"
                        wire:change="changeCampo({{ $detalle }},'observaciones',$event.target.value)"/>
                    </div>
                    <div class="w-1/12 mx-auto space-x-3 text-right">
                        @can('presupuestos.delete')
                        <x-icon.delete-a class="w-8" wire:click.prevent="delete({{ $detalle->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" title="Eliminar"/>
                        @endcan
                    </div>
                </div>
            @empty
                <div class="flex w-full">
                    <div class="w-full">No hay datos</div>
                </div>
            @endforelse
        </div>
        @can('presupuestos.edit')
        <div class="w-full py-1 bg-green-200 ">
            <form wire:submit.prevent="save">
                <div class="flex w-full px-6 space-x-3">
                    <div class="w-3/12">
                        <x-input.text  type="text" wire:model.defer="concepto" placeholder="nuevo concepto"
                                class="py-1 border-none shadow-none" name="concepto"/>
                    </div>
                    <div class="w-1/12">
                        <x-select selectname="zona" type="text" wire:model.defer="zona"
                            class="w-full py-1.5 border-none shadow-none">
                            <option value="ES">ES</option>
                            <option value="CA">CA</option>
                            <option value="PT">PT</option>
                        </x-select>
                    </div>
                    <div class="w-1/12">
                        <x-input.text type="number" wire:model.lazy="unidades" placeholder="uds"
                            class="py-1 text-right border-none shadow-none"/>
                    </div>
                    <div class="w-1/12">
                        <x-input.text type="number" step="any" wire:model.lazy="preciounidad" placeholder="€/ud"
                            class="py-1 text-right border-none shadow-none"/>
                    </div>
                    <div class="w-1/12">
                        <x-input.text type="number" step="any" wire:model.lazy="total" placeholder="total"
                        class="py-1 text-right bg-blue-200 border-none shadow-none"
                        disabled/>
                    </div>
                    <div class="w-4/12">
                        <x-input.text type="text" wire:model.lazy="observaciones" placeholder="observaciones"
                        class="py-1 border-none shadow-none"/>
                    </div>
                    <div class="w-1/12 mx-auto space-x-3 text-right">
                        <button type="submit" class="items-center pl-1 mx-0 mt-2 text-center w-7 "><x-icon.save-a class="text-blue"></x-icon.save-a></button>
                    </div>
                </div>
            </form>
        </div>
        @endcan
    </div>
    @endif
</div>
