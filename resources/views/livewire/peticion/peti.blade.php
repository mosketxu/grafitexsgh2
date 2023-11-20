<div class="">
    <div class="p-1 mx-2">
        <div class="flex flex-row">
            <div class="w-4/12">
                <div class="flex flex-row items-center">
                    @if($peticion->id)
                        <h1 class="text-2xl font-semibold text-gray-900">Petición: {{ $peticion->id }}</h1>
                    @else
                        <h1 class="text-2xl font-semibold text-gray-900">Nueva Petición</h1>
                    @endif
                </div>
            </div>
            <div class="flex w-4/12 space-x-2 text-center">
                @if($peticion->id && $peticion->estadopeticion_id=='1')
                    @if($peticion->estadopeticion_id=='1')
                    <form method="GET" action="{{route('peticion.enviopeticion',[$peticion]) }}">
                    <x-button.primary type="submit">Enviar mail de petición</x-button.primary>
                    </form>
                    @endif
                @endif
            </div>
            <div class="w-4/12 text-right">
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
        <div class="flex-none w-full m-2 text-gray-500 rounded-md bg-blue-50 lg:w-7/12 ">
            <div class="m-2">
                @include('peticion.peticion')
            </div>
            <div class="m-2">
                @include('peticiondetalle.index')
            </div>
        </div>
        <div class="w-full m-2 text-gray-500 lg:w-5/12 ">
            @include('peticionhistorial.index')
        </div>
    </div>
</div>
