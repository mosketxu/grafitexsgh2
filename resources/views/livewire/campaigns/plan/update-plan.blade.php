<div>
    @include('errores')
    <div class="flex-none p-2 space-y-2 md:space-x-2 md:flex md:space-y-0">
        <div class="w-full md:w-4/12">
            <label for="fechamontador1">Fecha <span class="font-bold underline"> {{ $campaigntienda->monta1 }} </span> Real</label>
            <input type="date" class="w-full py-1 text-sm border-blue-300 rounded-md form-control form-control-sm {{ $deshabilitadofechamontadorcolor }}" wire:model='fechamontador1'
                {{ $deshabilitadofechamontador }}/>
        </div>
        @if($campaigntienda->fechaprev2!='')
        <div class="w-full md:w-4/12">
            <label for="fechamontador2">Fecha <span class="font-bold underline"> {{ $campaigntienda->monta2 }} </span> Real</label>
            <input type="date" class="w-full py-1 text-sm border-blue-300 rounded-md form-control form-control-sm {{ $deshabilitadofechamontadorcolor }}" wire:model='fechamontador2'
                {{ $deshabilitadofechamontador }}/>
        </div>
        @endif
        @if($campaigntienda->fechaprev3!='')
        <div class="w-full md:w-4/12">
            <label for="fechamontador3">Fecha <span class="font-bold underline"> {{ $campaigntienda->monta3 }} </span> Real</label>
            <input type="date" class="w-full py-1 text-sm border-blue-300 rounded-md form-control form-control-sm {{ $deshabilitadofechamontadorcolor }}" wire:model='fechamontador3'
                {{ $deshabilitadofechamontador }}/>
        </div>
        @endif
    </div>
    {{-- @if($deshabilitado!='disabled') --}}
    <div class="w-full p-2">
        {{-- <button type="submit" class="items-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-blue-800 border border-transparent rounded-md hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25">{{ __('Guardar') }}</button> --}}
        <button type="button" wire:click="save" class="items-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition bg-blue-800 border border-transparent rounded-md hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25" >Guardar</button>
    </div>
    {{-- @endif --}}

    <x-input.filepond wire:model="imagenes" multiple/>

    <div class="grid grid-cols-1 gap-2 m-2 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($galeria as $imagen )
            <form action="{{ route('plan.deleteimagentienda', [$campaigntienda,$imagen]) }}" method ="POST" >
            @csrf
            {{ method_field('DELETE') }}
            <img alt={{$imagen->imagen}} class="object-contain w-full border-2 rounded-md shadow-md cursor-pointer max-h-[20rem] md:max-h-[10rem] lg:max-h-[20rem]"
                src="{{asset('storage/plan/'.$campaigntienda->campaign_id.'/'.$campaigntienda->id.'/'.$imagen->imagen.'?'.time())}}"
                onclick="location.href = '{{ asset('storage/plan/'.$campaigntienda->campaign_id.'/'.$campaigntienda->id.'/'.$imagen->imagen) }}'" target="_blank"/>
            @can('plantienda.delete')
                <button type="submit" class="ml-5"><x-icon.trash class="text-red-500 " /></button>
            @endcan
            </form>
        @endforeach
    </div>

        {{-- <input type="file" wire:model="imagenes" multiple> --}}

</div>
