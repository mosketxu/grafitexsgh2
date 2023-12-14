<div class="">
    <div class="p-1 mx-2">
        <div class="flex flex-row">
            <div class="flex items-center w-6/12">
                <div class="w-6/12">
                    @if($peticion->id)
                        <h1 class="text-2xl font-semibold text-gray-900">Petición: {{ $peticion->id }}</h1>
                    @else
                        <h1 class="text-2xl font-semibold text-gray-900">Nueva Petición</h1>
                    @endif
                </div>
                <div class="flex items-center w-6/12">
                    <div class="">
                        <x-jet-label class="pl-2" for="total">{{ __('Estado') }}</x-jet-label>
                    </div>
                    <div class="mx-2">
                        <input type="text" value="{{ $estadotexto }}" class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-blue-400 focus:outline-none" disabled>
                    </div>
                </div>
            </div>
            <div class="flex w-4/12 space-x-2 text-center">
                @if($peticion->id && $peticion->peticionestado_id=='1' )
                    @if($peticion->peticionestado_id=='1' && $peticion->peticiondetalles->count()>1)
                    <form method="GET" action="{{route('peticion.enviopeticion',[$peticion]) }}">
                    <x-button.primary type="submit">Enviar mail de petición</x-button.primary>
                    </form>
                    @else
                        <x-button class="text-red-500 border-red-500" type="button" disabled>Añadir productos antes de enviar la petición</x-button>
                    @endif
                @endif
                {{-- @if(Auth::user()->hasRole('sgh'))
                    @if($peticion->peticionestado_id>'2')
                    <form method="GET" action="{{route('peticion.enviopeticionSGH',[$peticion]) }}">
                    <x-button.primary type="submit">Enviar mail de confirmación</x-button.primary>
                    </form>
                    @endif
                @endif --}}
            </div>
            <div class="w-2/12 text-right">
                @if($estado=='1')
                @can('peticion.create')
                    <x-button.button  onclick="location.href = '{{ route('peticion.create') }}'" color="blue">Nuevo</x-button.button>
                @endcan
                @endif
            </div>
        </div>

    </div>
    <div class="px-2 py-1 space-y-2" >
        <div class="">
            @include('errores')
        </div>
    </div>

    <div class="flex-none lg:flex">
        <div class="flex-none w-full m-1 text-gray-500 rounded-md bg-blue-50 lg:w-7/12 ">
            <div class="">
                @include('peticion.peticion')
            </div>
            <div class="m-1">
                @include('peticiondetalle.index')
            </div>
        </div>
        <div class="w-full text-gray-500 lg:w-5/12 ">
            @include('peticionhistorial.index')
        </div>
    </div>
</div>
