<div class="mx-2 bg-gray-100 border-blue-900 rounded-md shadow-md">
    <div class="h-full p-1 mx-2">
        <div class="">
            <div class="my-1">
                <h2 class="text-lg font-semibold leading-tight text-gray-800">Historial</h2>
            </div>
            <div class="flex w-full py-1 text-xs text-gray-500 bg-blue-100 rounded-t-md">
                <div class="w-6/12 font-light" ><input type="text" class="w-full py-0 text-xs text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Usuario') }}" /></div>
                <div class="w-3/12 font-light" ><input type="text" class="w-full py-0 text-xs text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Estado') }}" /></div>
                <div class="w-3/12 font-light" ><input type="text" class="w-full py-0 text-xs text-center text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Fecha') }}" /></div>
            </div>
        <div>
        @forelse ($historial as $historia)
        <div class="items-center even:bg-gray-50 odd:bg-gray-100 ">
            <div class="flex w-full pl-2 space-x-1 py-0.5 text-xs border-t-0 " wire:loading.class.delay="opacity-50">
                <div class="w-6/12">
                    {{ $historia->usuario->name ?? '-'}}
                </div>
                <div class="w-3/12">
                    {{ $historia->estadohistorial->estadopeticion ?? '-' }}
                </div>
                <div class="w-3/12 text-center">
                    {{ $historia->updated_at->format('d-m-Y') }}
                </div>
            </div>
            <div class="flex even:bg-gray-50 odd:bg-gray-100 items-center w-full pl-2 py-0.5 text-xs border-t-0 " wire:loading.class.delay="opacity-50">
                <div class="flex items-center w-full p-0 m-0">
                    <div class="items-center w-1/12 p-0 m-0 font-light" ><input type="text" class="w-full py-0 text-xs text-gray-500 bg-transparent border-0 rounded-md" value= "{{ __('Obs:') }}" /></div>
                    <div class="w-11/12 p-0 m-0">
                        <textarea rows="1" class="w-full py-1 text-xs font-thin bg-transparent border-gray-300 rounded-md" readonly>{{ $historia->observaciones }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div>
            <div colspan="10">
                <div class="flex items-center justify-center">
                    <x-icon.inbox class="w-8 h-8 text-gray-300"/>
                    <span class="py-5 text-xl font-medium text-gray-500">
                        No se han encontrado datos...
                    </span>
                </div>
            </div>
        </div>
        @endforelse
    </div>
    <div class="">
        @if(!is_null($peticion->estado))
            @if(Auth::user()->hasRole('tienda'))
                @if($peticion->estado>'3')
                    @livewire('peticion-historial.peti-historial',['peticion'=>$peticion,'ruta'=>$ruta],key($peticion->id))
                @endif
            @elseif (Auth::user()->hasRole('sgh'))
                @if($peticion->estado>'1')
                    @livewire('peticion-historial.peti-historial',['peticion'=>$peticion,'ruta'=>$ruta],key($peticion->id))
                @endif
            @endif
        @endif
    </div>
</div>
