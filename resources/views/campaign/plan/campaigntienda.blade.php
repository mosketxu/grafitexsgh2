<div class="p-1 mx-2">
    {{-- <div class="">
        @include('errores')
    </div> --}}

    {{-- form fechas previstas --}}
    <form action="{{ route('montador.updatefechasplan',$camptienda) }}"  method="post">
        @csrf
        @method('PUT')
        <div class="text-sm text-gray-500 border border-blue-300 rounded shadow-md">
            {{-- store --}}
            <div class="w-full px-2 bg-gray-100 rounded-md">
                <label for="store">Store</label>
                <div class="w-full p-1 text-sm bg-gray-100 border border-gray-500 rounded-md form-control form-control-sm">
                    {{ $camptienda->tienda->name }} ({{ $camptienda->tienda->city }})
                </div>
            </div>
            {{-- fechas previstas --}}
            <div class="flex-none w-full p-2 space-y-2 bg-gray-100 md:flex md:space-y-0 md:space-x-2">
                <div class="w-full md:w-4/12">
                    <label for="fechaprev1">Fecha de <span class="font-bold underline"> {{ $camptienda->monta1  }} </span> prevista</label>
                    <input type="hidden" name="montaje1" value="{{ $camptienda->montaje1 }}">
                    <input type="date" class="w-full py-1 text-sm {{ $deshabilitadocolor }} rounded-md form-control form-control-sm" id="fechaprev1"
                        name="fechaprev1"  value="{{ old('fechaprev1',$camptienda->fechaprev1) }}" {{ $deshabilitado }} />
                </div>
                @if($camptienda->fechaprev2!='')
                <div class="w-full md:w-4/12">
                    <label for="fechaprev2">Fecha de <span class="font-bold underline"> {{ $camptienda->monta2 }} </span> prevista</label>
                    <input type="hidden" name="montaje2" value="{{ $camptienda->montaje2 }}">
                    <input type="date" class="w-full py-1 text-sm {{ $deshabilitadocolor }} rounded-md form-control form-control-sm" id="fechaprev2"
                        name="fechaprev2" value="{{ old('fechaprev2',$camptienda->fechaprev2) }}" {{ $deshabilitado }} />
                </div>
                @endif
                @if($camptienda->fechaprev3!='')
                <div class="w-full md:w-4/12">
                    <label for="fechaprev3">Fecha de <span class="font-bold underline"> {{ $camptienda->monta3 }} </span> prevista</label>
                    <input type="hidden" name="montaje3" value="{{ $camptienda->montaje3 }}">
                    <input type="date" class="w-full py-1 text-sm {{ $deshabilitadocolor }} rounded-md form-control form-control-sm" id="fechaprev3"
                        name="fechaprev3" value="{{ old('fechaprev3',$camptienda->fechaprev3) }}" {{ $deshabilitado }} />
                </div>
                @endif
            </div>
            <div class="flex w-full p-2 space-x-2 bg-gray-100 ">
                @can('plan.create')
                <x-button type="submit" class="text-white bg-blue-500">Actualiza fechas previstas</x-button>
                @endcan
            </div>
        </div>
    </form>
    {{-- Seleccion de Montador --}}
    <div class="w-full mt-2 rounded-md bg-blue-50 ">
        @can('plan.create')
        <div class="flex-none w-full p-2 space-y-2 md:flex md:space-x-2 md:space-y-0">
            <form method="GET" action="{{route('plan.edit',$camptienda) }}" class="w-full md:w-4/12">
                <div class="w-full ">Selección de Montadores por Area</div>
                <x-select  selectname="filtroarea" class="w-full py-1 text-sm border-blue-300" id="filtroarea" name="filtroarea" >
                    <option value="">--Area montador--</option>
                    @foreach ($areas as $area )
                    <option value="{{ $area->id }}" {{ $area->id== $filtroarea ? 'selected' : '' }}>{{ $area->area }}</option>
                    @endforeach
                </x-select>
            </form>
            <form method="post" action="{{ route('montador.updatemontadortienda',$camptienda) }}" class="flex items-end w-full md:w-8/12">
            @csrf
            @method('PUT')
                <div class="w-5/12">
                    <div class="w-full ">Montador</div>
                    <x-select  selectname="montador_id" class="w-full text-sm border-blue-300" id="montador_id" name="montador_id" >
                        <option value="">--Selecciona el montador--</option>
                        @foreach ($montadores as $montador )
                        <option value="{{ $montador->id }}" {{ $montador->id== $camptienda->montador_id ? 'selected' : '' }}>{{ $montador->entidad }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="w-3/12 ml-2">
                    <div class="w-1/12"><x-jet-label class="text-base">€</x-jet-label></div>
                    <div class="w-11/12"><x-input.text type="number" step="any" id="preciomontador" class="w-full text-sm rounded-md " name="preciomontador" value="{{ $camptienda->preciomontador }}"/></div>
                </div>
                <div class="w-3/12">
                    <div class="w-2/12"><x-jet-label class="text-base">Pedido</x-jet-label></div>
                    <div class="w-10/12"><x-input.text type="text" id="pedidocliente" class="w-full text-sm rounded-md " name="pedidocliente" value="{{ $camptienda->pedidocliente }}"/></div>
                </div>
                <div class="items-center w-1/12">
                    <button type="submit"><x-icon.save class="w-5 text-blue-500"/></button>
                </div>
            </form>
        </div>
        @endcan
    </div>
    @can('plan.create')
    <div class="flex items-center w-full p-2 ">
        <x-jet-label for="Montador" class="mr-2">Montador</x-jet-label>
        <input type="text" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="montador_id"
            name="montador_id" value="{{ $camptienda->montador->entidad ?? '' }}" disabled />
    </div>
    @endcan
    {{-- @can('plantienda.update') --}}
        @livewire('campaigns.plan.update-plan',['campaigntienda'=>$camptienda,'ruta'=>$ruta])
    {{-- @endcan --}}
    <div class="my-2">
        <button type="button" onclick="location.href = '{{ route($ruta,$camptienda->campaign_id) }}'"
            class="items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
            {{ __('Volver') }}
        </button>
    </div>
</div>

@push('scriptchosen')

<script>

var select = document.getElementById('estadomontaje');
select.onchange = function(){
    this.form.submit();
};

var select = document.getElementById('filtroarea');
select.onchange = function(){
    this.form.submit();
};

</script>

<script>
    function EliminarRegistro(value){
        action = confirm(value) ? true: event.preventDefault()
    }

</script>


@endpush
