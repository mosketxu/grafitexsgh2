<div>
    {{-- @include('errores') --}}

        @if($deshabilitado!='disabled')
        <div class="w-full p-2">
            <button type="button" wire:click="save" class="items-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-blue-800 border border-transparent rounded-md hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25" >Guardar Imágenes</button>
        </div>
        @endif



    <x-input.filepond wire:model="imagenes" multiple/>

    <div class="grid grid-cols-1 gap-2 m-2 md:grid-cols-3 lg:grid-cols-5">
        @foreach ($galeria as $imagen )
            <form action="{{ route('producto.deleteimagen', [$producto,$imagen]) }}" method ="POST" >
            @csrf
            {{ method_field('DELETE') }}
            <img alt={{$imagen->imagen}} class="object-contain w-full border-2 rounded-md shadow-md cursor-pointer max-h-40 md:h-40"
                src="{{asset('storage/producto/'.$producto->id.'/'.$imagen->imagen.'?'.time())}}"
                onclick="location.href = '{{ asset('storage/producto/'.$producto->id.'/'.$imagen->imagen) }}'" target="_blank"/>
            @can('productoimagen.delete')
                <button type="submit" class="ml-5"><x-icon.trash class="text-red-500 " /></button>
            @endcan
            </form>
        @endforeach
    </div>
</div>
