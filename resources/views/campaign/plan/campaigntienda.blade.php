<div class="p-1 mx-2">
    <div class="">
        @include('errores')
    </div>
    <div class="text-sm text-gray-500 border border-blue-300 rounded shadow-md">
        <div class="w-full px-2 bg-gray-100 rounded-md">
            <label for="store">Store</label>
            <div class="w-full p-1 text-sm bg-gray-100 border border-gray-500 rounded-md form-control form-control-sm">
                {{ $camptienda->tienda->name }} ({{ $camptienda->tienda->city }})
            </div>
        </div>
        <div class="flex w-full p-2 space-x-2 bg-gray-100 rounded-md">
            <div class="w-6/12">
                <label for="fechainiprev">F.Inicio Prevista.</label>
                <input type="date" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="fechainiprev"
                    name="fechainiprev"
                            value="{{ old('fechainiprev',$camptienda->fechainiprev) }}"
                    disabled />
            </div>
            <div class="w-6/12">
                <label for="fechafinprev">F.Fin Prevista.</label>
                <input type="date" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="fechafinprev"
                    name="fechafinprev"
                    value="{{ old('fechafinprev',$camptienda->fechafinprev) }}"
                    disabled />
            </div>
        </div>
        <div class="flex w-full p-2 space-x-2 rounded-md bg-blue-50">
            @can('plan.create')
            <div class="w-2/12">Montadores por Area</div>
            <div class="w-5/12">
                <form method="GET" action="{{route('plam.tiendaedit',$camptienda) }}">
                    <x-select  selectname="filtroarea" class="w-full py-1 text-sm border-blue-300" id="filtroarea" name="filtroarea" >
                        <option value="">--Area montador--</option>
                        @foreach ($areas as $area )
                        <option value="{{ $area->id }}" {{ $area->id== $filtroarea ? 'selected' : '' }}>{{ $area->area }}</option>
                        @endforeach
                    </x-select>
                </form>
            </div>
            <div  class="w-5/12">
                <form action="{{ route('plan.updateamontadortienda',$camptienda) }}"  method="post" class="w-full">
                    @csrf
                    @method('PUT')
                    <x-select  selectname="proveedor_id" class="w-full py-1 text-sm border-blue-300" id="proveedor_id" name="proveedor_id" >
                        <option value="">--Selecciona el montador--</option>
                        @foreach ($montadores as $montador )
                        <option value="{{ $montador->id }}" {{ $montador->id== $camptienda->proveedor_id ? 'selected' : '' }}>{{ $montador->entidad }}</option>
                        @endforeach
                    </x-select>
                </form>
            </div>
            @endcan
        </div>
        <div class="">
            <form action="{{ route('plan.updatetiendafecha',$camptienda) }}"  method="post" class="w-full">
                @csrf
                @method('PUT')
                <div class="flex p-2 space-x-2">
                    <div class="w-full">
                        <label for="Montador">Montador</label>
                        <div class="flex">
                            <input type="text" class="w-full py-1 text-sm bg-gray-100 rounded-md form-control form-control-sm" id="proveedor_id"
                                name="proveedor_id"
                                value="{{ old('proveedor_id',$camptienda->montador->entidad ?? '') }}"
                                disabled />
                            </div>
                    </div>
                </div>
                <div class="flex p-2 space-x-2">
                    <div class="w-6/12">
                        <label for="fechainimontador">F.Ini.Montaje Real.</label>
                        <input type="date" class="w-full py-1 text-sm border-blue-300 rounded-md form-control form-control-sm" id="fechainimontador"
                        name="fechainimontador"
                        value="{{ old('fechainimontador',$camptienda->fechainimontador) }}"/>
                    </div>
                    <div class="w-6/12">
                        <label for="fechafinmontador">F.Fin Montaje Real.</label>
                        <input type="date" class="w-full py-1 text-sm border-blue-300 rounded-md form-control form-control-sm" id="fechafinmontador"
                        name="fechafinmontador"
                        value="{{ old('fechafinmontador',$camptienda->fechafinmontador) }}"/>
                    </div>
                </div>
                <div class="w-full p-2">
                    <x-jet-button type="submit" class="w-full py-1.5 bg-blue-600 border-blue-900 hover:bg-blue-800"  >{{ __('Guardar') }}</x-jet-button>
                </div>
            </form>
            <form action="{{ route('plan.uploadimagentienda',$camptienda) }}"
                    method="POST"
                    class="dropzone"
                    id="my-awesome-dropzone">
            </form>
            <div class="grid grid-cols-1 gap-2 m-2 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($galeria as $imagen )
                    <form action="{{ route('plan.deleteimagentienda', [$camptienda,$imagen]) }}" method ="POST" >
                    @csrf
                    {{ method_field('DELETE') }}
                        <img alt={{$imagen->imagen}} class="object-cover w-full border-2 rounded-md shadow-md cursor-pointer"
                            src="{{asset('storage/plan/'.$camptienda->campaign_id.'/'.$camptienda->id.'/'.$imagen->imagen.'?'.time())}}"
                            onclick="location.href = '{{ asset('storage/plan/'.$camptienda->campaign_id.'/'.$camptienda->id.'/'.$imagen->imagen) }}'" target="_blank"/>
                        <button type="submit" class="ml-5"><x-icon.trash class="text-red-500 " /></button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

</div>

@push('scriptchosen')

<script>

var select = document.getElementById('filtroarea');
select.onchange = function(){
    this.form.submit();
};

var select = document.getElementById('proveedor_id');
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
