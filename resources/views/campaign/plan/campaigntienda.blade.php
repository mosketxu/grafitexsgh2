<div class="p-1 mx-2">
    <div class="">
        @include('errores')
    </div>
    {{-- form fechas previstas --}}
    <form action="{{ route('montador.updatefechasmontador',$camptienda) }}"  method="post">
        @csrf
        @method('PUT')
        <div class="text-sm text-gray-500 border border-blue-300 rounded shadow-md">
            {{-- store --}}
            <div class="w-full px-2 bg-gray-100 rounded-md">
                <label for="store">Store</label>
                <div class="w-full p-1 text-sm bg-gray-100 border border-gray-500 form-control form-control-sm rounded-md">
                    {{ $camptienda->tienda->name }} ({{ $camptienda->tienda->city }})
                </div>
            </div>
            {{-- fechas previstas --}}
            <div class="flex-none w-full p-2 bg-gray-100 space-y-2 md:flex md:space-y-0 md:space-x-2">
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
                <x-button type="submit" class="bg-blue-500 text-white">Actualiza fechas previstas</x-button>
                @endcan
            </div>
        </div>
    </form>
    {{-- Seleccion de Montador --}}
    <div class="flex-none w-full p-2 space-y-2 bg-blue-50 rounded-md md:flex md:space-x-2">
        @can('plan.create')
        <div class="w-full md:w-2/12">Selección de Montadores por Area</div>
        <div class="w-full md:w-5/12 ">
            <form method="GET" action="{{route('plan.edit',$camptienda) }}">
                <x-select  selectname="filtroarea" class="w-full py-1 text-sm border-blue-300" id="filtroarea" name="filtroarea" >
                    <option value="">--Area montador--</option>
                    @foreach ($areas as $area )
                    <option value="{{ $area->id }}" {{ $area->id== $filtroarea ? 'selected' : '' }}>{{ $area->area }}</option>
                    @endforeach
                </x-select>
            </form>
        </div>
        <div  class="w-full md:w-5/12">
            <form action="{{ route('montador.updatemontadortienda',$camptienda) }}"  method="post" class="w-full">
                @csrf
                @method('PUT')
                <x-select  selectname="montador_id" class="w-full py-1 text-sm border-blue-300" id="montador_id" name="montador_id" >
                    <option value="">--Selecciona el montador--</option>
                    @foreach ($montadores as $montador )
                    <option value="{{ $montador->id }}" {{ $montador->id== $camptienda->montador_id ? 'selected' : '' }}>{{ $montador->entidad }}</option>
                    @endforeach
                </x-select>
            </form>
        </div>
        @endcan
    </div>
    <form action="{{ route('montador.updatefechasmontador',$camptienda) }}"  method="post">
        @csrf
        @method('PUT')
        <div class="">
            <div class="p-2 ">
                <label for="Montador">Montador</label>
                <input type="text" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="montador_id"
                    name="montador_id" value="{{ $camptienda->montador->entidad ?? '' }}" disabled />
            </div>
            <div class="flex-none p-2 space-y-2 md:space-x-2 md:flex md:space-y-0">
                <div class="w-full md:w-4/12">
                    <label for="fechamontador1">Fecha <span class="font-bold underline"> {{ $camptienda->monta1 }} </span> Real</label>
                    <input type="date" class="w-full py-1 text-sm border-blue-300 rounded-md form-control form-control-sm" id="fechamontador1"
                        name="fechamontador1" value="{{ old('fechamontador1',$camptienda->fechamontador1) }}"/>
                </div>
                @if($camptienda->fechaprev2!='')
                <div class="w-full md:w-4/12">
                    <label for="fechamontador2">Fecha <span class="font-bold underline"> {{ $camptienda->monta2 }} </span> Real</label>
                    <input type="date" class="w-full py-1 text-sm border-blue-300 rounded-md form-control form-control-sm" id="fechamontador2"
                        name="fechamontador2" value="{{ old('fechamontador2',$camptienda->fechamontador2) }}"/>
                </div>
                @endif
                @if($camptienda->fechaprev3!='')
                <div class="w-full md:w-4/12">
                    <label for="fechamontador3">Fecha <span class="font-bold underline"> {{ $camptienda->monta3 }} </span> Real</label>
                    <input type="date" class="w-full py-1 text-sm border-blue-300 rounded-md form-control form-control-sm" id="fechamontador3"
                        name="fechamontador3" value="{{ old('fechamontador3',$camptienda->fechamontador3) }}"/>
                </div>
                @endif
            </div>
            <div class="w-full p-2">
                <button type="submit" class="w-full text-center  items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">{{ __('Guardar') }}</button>
            </div>
        </div>
    </form>
    <form action="{{ route('plan.uploadimagentienda',$camptienda) }}"
            method="POST"
            class="dropzone"
            id="my-awesome-dropzone">
    </form>
    <div class="grid grid-cols-1 gap-2 m-2  md:grid-cols-2 lg:grid-cols-3">
        @foreach ($galeria as $imagen )
            <form action="{{ route('plan.deleteimagentienda', [$camptienda,$imagen]) }}" method ="POST" >
            @csrf
            {{ method_field('DELETE') }}
                <img alt={{$imagen->imagen}} class="object-contain w-full border-2 rounded-md shadow-md cursor-pointer max-h-[20rem] md:max-h-[10rem] lg:max-h-[20rem]"
                    src="{{asset('storage/plan/'.$camptienda->campaign_id.'/'.$camptienda->id.'/'.$imagen->imagen.'?'.time())}}"
                    onclick="location.href = '{{ asset('storage/plan/'.$camptienda->campaign_id.'/'.$camptienda->id.'/'.$imagen->imagen) }}'" target="_blank"/>
                <button type="submit" class="ml-5"><x-icon.trash class="text-red-500 " /></button>
            </form>
        @endforeach
    </div>
    <div class="my-2">
        <button type="button" onclick="location.href = '{{ route('plan.index',$camptienda->campaign_id) }}'"
            class="text-center  items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            {{ __('Volver') }}
        </button>
    </div>
</div>

@push('scriptchosen')

<script>

var select = document.getElementById('filtroarea');
select.onchange = function(){
    this.form.submit();
};

var select = document.getElementById('montador_id');
select.onchange = function(){
    this.form.submit();
};


</script>

<script>
Dropzone.options.myAwesomeDropzone = {
    headers:{
        'X-CSRF-TOKEN' : "{{ csrf_token() }}"
    },
    paramName: "imagen", // The name that will be used to transfer the file
    maxFilesize: 4, // MB
    dictDefaultMessage:"Arrastra tus archivos aqui o haz clic para subir",
    acceptedFiles:"image/*",
  };

</script>

<script>
    function EliminarRegistro(value){
        action = confirm(value) ? true: event.preventDefault()
    }

</script>


@endpush
