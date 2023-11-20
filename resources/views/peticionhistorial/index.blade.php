<div class="mx-2 bg-gray-100 border-blue-900 rounded-md shadow-md">
    <div class="h-full p-1 mx-2">
        <div class="">
            <div class="my-1">
                <h2 class="text-lg font-semibold leading-tight text-gray-800">Historial</h2>
            </div>
            <div class="flex w-full py-1 text-xs text-gray-500 bg-blue-100 rounded-t-md">
                <div class="w-2/12 font-light md:w-2/12" ><input type="text" class="w-full py-0 text-xs text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Usuario') }}" /></div>
                <div class="w-2/12 font-light md:w-2/12" ><input type="text" class="w-full py-0 text-xs text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Estado') }}" /></div>
                <div class="w-6/12 font-light md:w-6/12" ><input type="text" class="w-full py-0 text-xs text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Observaciones') }}" /></div>
                <div class="w-2/12 font-light md:w-2/12" ><input type="text" class="w-full py-0 text-xs text-center text-gray-500 bg-blue-100 border-0 rounded-md" value= "{{ __('Fecha') }}" /></div>
            </div>
            <div>
                @forelse ($historial as $historia)
                    <div class="flex even:bg-gray-50 odd:bg-gray-100 items-center w-full pl-2 space-x-1 py-0.5 text-xs border-t-0 " wire:loading.class.delay="opacity-50">
                        <div class="w-2/12 md:w-2/12 ">
                            {{-- <x-input.text type="text" class="w-full text-xs font-thin text-gray-500 bg-gray-100 border-blue-100 rounded-md" value="{{ $historia->usuario->name ?? '-'}}" /> --}}
                            {{ $historia->usuario->name ?? '-'}}
                        </div>
                        <div class="w-2/12 md:w-2/12 ">
                            {{-- <x-input.text type="text" class="w-full text-xs font-thin text-gray-500 bg-gray-100 border-blue-100 rounded-md" value="{{ $historia->estadopeticion_id}} - {{ $historia->estadohistorial->estadopeticion ?? '-' }}" disabled/> --}}
                            {{ $historia->estadohistorial->estadopeticion ?? '-' }}
                        </div>
                        <div class="w-6/12 md:flex md:w-6/12">
                            <textarea rows="1" class="w-full py-1 text-xs font-thin bg-transparent border-gray-300 rounded-md" readonly>{{ $historia->observaciones }}</textarea>
                        </div>
                        <div class="w-2/12 text-center md:w-2/12">
                            {{-- <x-input.text type="text" class="w-full text-xs font-thin text-center text-gray-500 bg-gray-100 border-blue-100 rounded-md" value="{{ $historia->updated_at->format('d-m-Y') }}"  disabled/> --}}
                            {{ $historia->updated_at->format('d-m-Y') }}
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
        </div>
        <div class="">
            @livewire('peticion-historial.peti-historial',['peticion'=>$peticion,'ruta'=>$ruta],key($peticion->id))
        </div>
    </div>
</div>
