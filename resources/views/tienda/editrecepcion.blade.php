<div class="">
    <div class="">
        @include('errores')
    </div>

    <div class="p-1 mx-2">
        <div class="flex w-full p-1 space-x-2 text-gray-500 bg-gray-100 border border-blue-300 rounded-md shadow-md">
            <div class="w-7/12">
                @include('campaign.campaigncabecera')
            </div>
            <div class="w-5/12">
                @include('campaign.campaigncabecerafechasmontaje')
            </div>
        </div>
    </div>
    <div class="mx-2">
        <div class="flex items-center py-2">
            <div class="flex w-6/12 space-x-2">
                <div class="pl-2 text-xl font-bold ">Lista de elementos recibidos</div>
                <form method="GET" action="{{route('tienda.editrecepcion',[$campaign->id,$store->id]) }}">
                    <x-input.text id="busca" name="busca"  type="search" name="search" value='{{$busqueda}}' placeholder="Search for..."/>
                </form>
            </div>
            <div class="flex w-6/12 space-x-2">
                <form method="GET" action="{{route('tienda.envioincidencias',[$campaign,$store]) }}">
                <x-button.primary type="submit">Enviar mail de incidencias</x-button.primary>
                </form>
            </div>
        </div>
        <div class="mx-2 my-2 border rounded-md">
            <div class="flex w-full pt-2 text-sm font-bold text-gray-500 bg-blue-100 rounded-t-md">
                <div class="w-1/12 pl-2">Ubicación</div>
                <div class="w-1/12 ">Mobiliario</div>
                <div class="w-1/12 ">Prop x <br> Elem.</div>
                <div class="w-1/12 ">Carteleria</div>
                <div class="w-1/12 ">Medida</div>
                <div class="w-1/12 ">Material</div>
                <div class="w-1/12">Unit x <br> Prop</div>
                <div class="w-1/12 pt-0 mt-0">
                    <form action="{{ route('tienda.editrecepcion',[$campaign,$store]) }}" method="GET">
                    @csrf
                    {{-- <div class="flex">
                        <div class="w-7"><x-icon.question class="w-2 text-black"/></div>
                        <div class="w-7">{{$sinvalorar}}</div>
                    </div> --}}
                    <div class="flex">
                        <div class="w-7"><x-icon.thumbs-up class="w-4 text-green-500"/></div>
                        <div class="w-7">{{$correctos}}</div>
                        <input type="checkbox" {{ $ok=="1" ? 'checked' : '' }} name="ok" value="ok" class="" onclick="event.preventDefault(); this.closest('form').submit();"/>
                    </div>
                    <div class="flex">
                        <div class="w-7"><x-icon.thumbs-down class="w-4 text-red-500"/></div>
                        <div class="w-7">{{$incidencias}}</div>
                        <input type="checkbox" {{ $ko=="1" ? 'checked' : '' }} name="ko" value="ko" class="" onclick="event.preventDefault(); this.closest('form').submit();"/>
                    </div>
                    </form>
                </div>
                <div class="w-1/12">Estado</div>
                <div class="w-2/12">Obs.Recep</div>
                <div class="w-1/12"></div>
            </div>
            @foreach ($elementos as $elemento)
                <form id="form{{$elemento->id}}" role="form" method="post" action="{{route('tienda.update',[$campaign,$store])}}">
                @method('PUT')
                @csrf
                <div class="flex items-center w-full py-1 text-sm text-gray-500 border-t-0 border-b hover:bg-gray-100 ">
                    <input type="hidden" name="storeId" value="{{$store->id}}">
                    <input type="hidden" name="elementoId" value="{{$elemento->id}}">
                    <input type="hidden" name="campaignId" value="{{$campaign->id}}">
                    <div class="w-1/12 pl-2">{{$elemento->ubicacion}}</div>
                    <div class="w-1/12">{{$elemento->mobiliario}}</div>
                    <div class="w-1/12">{{$elemento->propxelemento}}</div>
                    <div class="w-1/12">{{$elemento->carteleria}}</div>
                    <div class="w-1/12">{{$elemento->medida}}</div>
                    <div class="w-1/12">{{$elemento->material}}</div>
                    <div class="w-1/12">{{$elemento->unitxprop}}</div>
                    <div class="w-1/12">
                        @if($elemento->estadorecepcion=='1')
                            <x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/>
                        @else
                            <x-icon.thumbs-down  class="w-4 mb-1 text-red-500"/>
                        @endif
                    </div>
                    <div class="w-1/12 px-1 ">
                        <select name="estadorecepcion"  id="valorestado{{$elemento->id}}" onchange="event.preventDefault(); this.closest('form').submit();"
                            class = "w-full py-1 pl-1 text-xs text-left border-blue-300 rounded-md form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-xs" >
                                <option value="" {{$elemento->estadorecepcion == '' ? 'selected' : ''}}>-- Valorar--</option>
                            @foreach ($estadosrecep as $estado )
                                <option value="{{ $estado->id }}" {{$elemento->estadorecepcion == $estado->id ? 'selected' : ''}}>{{ $estado->estado }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-2/12 px-1 ">
                        <textarea rows="3" name="obsrecepcion" onchange="event.preventDefault(); this.closest('form').submit();"
                            class ="flex-1 block w-full py-1.5 text-xs transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300"
                            placeholder="Escribe tus comentarios">{{old('obsrecepcion', $elemento->obsrecepcion)}}</textarea>
                    </div>
                    <div class="w-1/12 cursor-default">
                        @if(file_exists( 'storage/galeria/'.$campaign->id.'/thumbnails/thumb-'.$elemento->imagen ))
                            <a href="{{asset('storage/galeria/'.$campaign->id.'/'.$elemento->imagen.'?'.time())}}" target="_blank" title="Ver producto">
                                <img src="{{asset('storage/galeria/'.$campaign->id.'/'.$elemento->imagen.'?'.time())}}"
                                    alt={{$elemento->imagen}} title={{$elemento->imagen}} id="original"
                                    class="p-1 mx-auto border-2 rounded-md shadow-md cursor-pointer" style="height: 60px" />
                            </a>
                        @else
                            <img src="{{asset('storage/galeria/pordefecto.jpg')}}" alt={{$elemento->imagen}}
                                title={{$elemento->imagen}} id="original" class="p-1 mx-auto border-2 rounded-md shadow-md"
                                style="height: 60px"/>
                        @endif
                    </div>
                </div>
                </form>
            @endforeach
        </div>
    </div>
</div>


@push('scriptchosen')

<script>

</script>

@endpush

