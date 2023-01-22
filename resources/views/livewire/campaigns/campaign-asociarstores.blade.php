<div>
    <div class="text-white bg-{{ $color }} flex justify-between rounded-t-md py-1" style="cursor: pointer" wire:click="$toggle('visible')" >
        <div class="text-left pt-1 pl-1 w-10"></div>
        <div class="text-center w-full" >{{ $titulo }}</div>
        <div class="tex-right pt-1 w-10" style="cursor: pointer" wire:click="$toggle('visible')">
            @if($visible=='1') <x-icon.circle-minus wire:click="$toggle('visible')"/> @else <x-icon.circle-plus wire:click="$toggle('visible')"/>@endif
        </div>
    </div>
    <div class="flex">
        <div class="w-6/12">
            <div class=" text-black font-semibold  flex justify-between" >
                <div class="text-center w-full" >Disponibles</div>
            </div>
            <div class="flex">
                <div class="text-left pt-2 pl-1 w-10"><x-input.checkbox wire:model="selectPagedisp" /></div>
                <div class="text-center w-full" ><x-input.text type="text" class="mx-1 my-1 py-1 text-xs" placeholder="Filtros" wire:model="searchdisponibles"/></div>
            </div>
            @if($visible=='1')
            <div class="space-y-1">
                <div class="flex">
                    <input type="button" value=">" wire:click="asociarselected()" class="w-6/12  text-lg border transform hover:bg-gray-200 hover:text-2xl'">
                    <input type="button" value=">>" wire:click="asociartodos()" class="w-6/12  text-lg border transform hover:bg-gray-200 hover:text-2xl">
                </div>
                <div class="bg-grey-light flex flex-col overflow-y-scroll w-full" style="height: 50vh;">
                    @forelse ($disponibles as $disponible)
                        <div class="flex w-full space-x-1 text-sm text-gray-500 border-t-0 border-y hover:bg-gray-200" style="cursor: pointer" wire:loading.class.delay="opacity-50">
                            <div class="text-left pt-1 pl-1 w-10"><x-input.checkbox wire:model="selecteddisp" value="{{ $disponible->id }}" /></div>
                            <div class="w-full " wire:click="asocia({{ $disponible }})" >{{ $disponible->ident }} - {{ $disponible->name }}</div>
                            <div class="tex-right pt-1 w-10"><x-icon.arrow-right-a class="text-green-700" wire:click="asocia({{ $disponible }})"/></div>
                        </div>
                    @empty
                        <div class="flex w-full text-sm text-left border-t-0 border-y" wire:loading.class.delay="opacity-50">
                            <div colspan="10" class=" justify-center"><x-icon.inbox class="w-8 h-8 text-gray-300"/><span class="py-5 text-base font-medium text-gray-500">No se han encontrado registros...</span></div>
                        </div>
                    @endforelse
                </div>
            </div>
            @endif
        </div>
        <div class="w-6/12">
            <div class=" text-black font-semibold  flex justify-between" >
                <div class="text-center w-full" >Seleccionadas</div>
            </div>
            <div class="flex">
                <div class="text-left pt-2 pl-1 w-10"><x-input.checkbox wire:model="selectPageaso" /></div>
                <div class="text-center w-full"><x-input.text type="text" class="mx-1 my-1 py-1 text-xs" placeholder="Filtros" wire:model="searchasociadas"/></div>
            </div>
            @if($visible=='1')
            <div class="space-y-1">
                <div class="flex">
                    <input type="button" value="<" wire:click="disociarselected()" class="w-6/12  text-lg border transform hover:bg-gray-200 hover:text-2xl'">
                    <input type="button" value="<<" wire:click="disociartodos()" class="w-6/12  text-lg border transform hover:bg-gray-200 hover:text-2xl">
                    {{-- <x-jet-secondary-button  onclick="location.href = '{{route('entidad.tipo','1')}}'">{{ __('Volver') }}</x-jet-secondary-button> --}}
                </div>
                <div class="bg-grey-light flex flex-col  overflow-y-scroll w-full" style="height: 50vh;">
                    @forelse ($asociadas as $asociada)
                    <div class="flex w-full space-x-1 text-sm text-gray-500 border-t-0 border-y hover:bg-gray-200" style="cursor: pointer" wire:loading.class.delay="opacity-50">
                        <div class="text-left pt-1 pl-1 w-10"><x-input.checkbox wire:model="selectedaso" value="{{ $asociada->id }}" /></div>
                            <div class="w-full" wire:click="disocia({{ $asociada->id }})">{{ $asociada->campo }} - {{ $asociada->name }}</div>
                            <div class="tex-right pt-1 w-10"><x-icon.arrow-left-a class="text-red-600" wire:click="disocia({{ $asociada->id }})"/></div>
                        </div>
                    @empty
                        <div class="flex w-full text-sm text-left border-t-0 border-y" wire:loading.class.delay="opacity-50">
                            <div colspan="12" class=" justify-center"><x-icon.inbox class="w-8 h-8 text-gray-300"/><span class="py-5 text-base font-medium text-gray-500">No se han encontrado registros...</span></div>
                        </div>
                    @endforelse
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
