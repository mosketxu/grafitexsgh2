<div class="w-full border rounded-md shadow-md">
    <div class="w-full text-white bg-{{ $color }} flex justify-between rounded-t-md py-1" style="cursor: pointer" wire:click="$toggle('visible')" >
        <div class="w-full text-center" > {{ $titulo }}</div>
        <div class="w-10 pt-1 tex-right" style="cursor: pointer" wire:click="$toggle('visible')">
            @if($visible=='1') <x-icon.circle-minus wire:click="$toggle('visible')"/> @else <x-icon.circle-plus wire:click="$toggle('visible')"/>@endif
        </div>
    </div>
    @if($visible=='1')
    <div class="flex overflow-hidden" style="height: 40vh;">
        <div class="w-6/12">
            <div class="flex justify-between font-semibold text-black " >
                <div class="w-full text-center" >Disponibles</div>
            </div>
            <div class="flex">
                <div class="w-full text-center" ><x-input.text type="text" class="py-1 mx-1 my-1 text-xs" placeholder="Filtros" wire:model="searchdisponibles"/></div>
            </div>
            <div class="space-y-1">
                <div class="flex">
                    <input type="button" value=">>" wire:click="asociartodos()" class="w-full text-lg transform border hover:bg-gray-200 hover:text-2xl">
                </div>
                <div class="flex flex-col w-full overflow-hidden overflow-y-scroll bg-grey-light" style="height: 26vh;">
                    @forelse ($disponibles as $disponible)
                        <div class="flex w-full space-x-1 text-sm text-gray-500 border-t-0 border-y hover:bg-gray-200 focus:bg-gray-100" style="cursor: pointer" wire:loading.class.delay="opacity-50">
                            {{-- <div class="w-full pl-2 " wire:click="asocia({{ $disponible }},'1')" >{{ $titulo=='Stores' ? ($disponible->ident . ' ' .$disponible->name) :  $disponible->ident }} </div> --}}
                            <div class="w-full pl-2 " >{{ $titulo=='Stores' ? ($disponible->ident . ' ' .$disponible->name) :  $disponible->ident }} </div>
                            <div class="w-10 pt-1 tex-right"><x-icon.arrow-right-a class="text-green-700" wire:click="asocia({{ $disponible }},'1')"/></div>
                        </div>
                    @empty
                        <div class="flex w-full text-sm text-left border-t-0 border-y" wire:loading.class.delay="opacity-50">
                            <div colspan="10" class="justify-center "><x-icon.inbox class="w-8 h-8 text-gray-300"/><span class="py-5 text-base font-medium text-gray-500">No se han encontrado registros...</span></div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="">
            <a href="{{route('campaign.filtrar',$campaign ) }}" title="Elementos"><x-icon.arrows-rotate class="text-blue-500"/></a>
        </div>
        <div class="w-6/12">
            <div class="flex justify-between font-semibold text-black " >
                <div class="w-full text-center" >Seleccionadas</div>
            </div>
            <div class="flex">
                <div class="w-full text-center"><x-input.text type="text" class="py-1 mx-1 my-1 text-xs" placeholder="Filtros" wire:model="searchasociadas"/></div>
            </div>
            <div class="space-y-1">
                <div class="flex">
                    <input type="button" value="<<" wire:click="disociartodos()" class="w-full text-lg transform border hover:bg-gray-200 hover:text-2xl">
                </div>
                <div class="flex flex-col w-full overflow-hidden overflow-y-scroll bg-grey-light" style="height: 26vh;">
                    @forelse ($asociadas as $asociada)
                    <div class="flex w-full space-x-1 text-sm text-gray-500 border-t-0 border-y hover:bg-gray-200" style="cursor: pointer" wire:loading.class.delay="opacity-50">
                        {{-- <div class="w-full pl-2" wire:click="disocia({{ $asociada->id }},'1')">{{ $titulo=='Stores' ? $asociada->campo : '' }}  {{ $asociada->name }}</div> --}}
                        <div class="w-full pl-2" >{{ $titulo=='Stores' ? $asociada->campo : '' }}  {{ $asociada->name }}</div>
                        <div class="w-10 pt-1 tex-right"><x-icon.arrow-left-a class="text-red-600" wire:click="disocia({{ $asociada->id }},'1')"/></div>
                    </div>
                    @empty
                        <div class="flex w-full text-sm text-left border-t-0 border-y" wire:loading.class.delay="opacity-50">
                            <div colspan="12" class="justify-center "><x-icon.inbox class="w-8 h-8 text-gray-300"/><span class="py-5 text-base font-medium text-gray-500">No se han encontrado registros...</span></div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
