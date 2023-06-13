<div class="">
    <div class="">
        @include('errores')
    </div>

    <div class="p-1 mx-2">
        <div class="flex w-full p-1 space-x-2 text-gray-500 bg-gray-100 border border-blue-300 rounded-md shadow-md">
            <div class="w-4/12 rounded-md ">
                <label for="campaign_name">Campaña</label>
                <input type="text" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                    name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                    disabled />
            </div>
            <div class="flex w-3/12 space-x-2">
                <div class="w-6/12">
                    <label for="campaign_initdate">Fecha Inicio</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_initdate"
                    name="campaign_initdate"
                    value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                    disabled />
                </div>
                <div class="w-6/12">
                    <label for="campaign_enddate">Fecha Finalización</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_enddate"
                        name="campaign_enddate"
                        value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                        disabled />
                </div>
            </div>
            <div class="flex w-5/12 space-x-2">
                <div class="w-4/12">
                    <div class="text-center"><label for="fechainstal1">Fecha Montaje 1</label></div>
                    <div class="flex">
                        <input type="date" class="w-9/12 py-1 bg-gray-100 rounded-md form-control form-control-sm" id="fechainstal1"
                        name="fechainstal1"
                        value="{{ old('fechainstal1',$campaign->fechainstal1) }}"
                        disabled />
                        <input type="text" class="w-3/12 py-1 bg-gray-100 rounded-md form-control form-control-sm" id="montaje1"
                        name="montaje1"
                        value="{{ old('montaje1',$campaign->montaje1) }}"
                        disabled />
                    </div>
                </div>
                <div class="w-4/12">
                    <div class="text-center"><label for="fechainstal2">Fecha Montaje 2</label></div>
                    <div class="flex">
                        <input type="date" class="w-9/12 py-1 bg-gray-100 rounded-md form-control form-control-sm" id="fechainstal2"
                        name="fechainstal2"
                        value="{{ old('fechainstal2',$campaign->fechainstal2) }}"
                        disabled />
                        <input type="text" class="w-3/12 py-1 bg-gray-100 rounded-md form-control form-control-sm" id="montaje2"
                        name="montaje2"
                        value="{{ old('montaje2',$campaign->montaje2) }}"
                        disabled />
                    </div>
                </div>
                <div class="w-4/12">
                    <div class="text-center"><label for="fechainstal1">Fecha Montaje 3</label></div>
                    <div class="flex">
                        <input type="date" class="w-9/12 py-1 bg-gray-100 rounded-md form-control form-control-sm" id="fechainstal3"
                        name="fechainstal3"
                        value="{{ old('fechainstal3',$campaign->fechainstal3) }}"
                        disabled />
                        <input type="text" class="w-3/12 py-1 bg-gray-100 rounded-md form-control form-control-sm" id="montaje3"
                        name="montaje3"
                        value="{{ old('montaje3',$campaign->montaje3) }}"
                        disabled />
                    </div>
                </div>
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
                {{-- <x-icon.arrows-rotate-a href="{{route('tienda.editrecepcion',[$campaign->id,$store->id])}}" class="text-blue-600"/> --}}
            </div>
            {{-- <div class="flex flex-row-reverse w-6/12 space-x-2">
                {{ $elementos->appends(request()->except('page'))->links() }}
            </div> --}}
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
                    <form action="{{ route('tienda.editrecepcion',[$campaign->id,$store->id]) }}" method="GET">
                    @csrf
                    <div class="flex">
                        <div class="w-7"><x-icon.question class="w-2 text-black"/></div>
                        <div class="w-7">{{$sinvalorar}}</div>
                        {{-- <input type="checkbox" {{ $nose=="1" ? 'checked' : '' }} name="nose" value="nose" class="" onclick="event.preventDefault(); this.closest('form').submit();"/> --}}

                    </div>
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
                <div class="w-8"></div>
            </div>
            @foreach ($elementos as $elemento)
                <form id="form{{$elemento->id}}" role="form" method="post" action="{{route('tienda.update')}}">
                @method('PUT')
                @csrf
                <div class="flex items-center w-full py-1 text-sm text-gray-500 border-t-0 border-b cursor-pointer hover:bg-gray-100 ">
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
                        @if($elemento->OK=='1')
                            <x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/>
                        @elseif($elemento->KO=='1')
                            <x-icon.thumbs-down  class="w-4 mb-1 text-red-500"/>
                        @else
                            <x-icon.question class="w-2 mb-1 text-black"/>
                        @endif
                    </div>
                    <div class="w-1/12 px-1 ">
                        <select name="estadorecepcion"  id="valorestado{{$elemento->id}}" class = "w-full py-1 pl-1 text-xs text-left border-blue-300 rounded-md form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-xs" >
                                <option value="" {{$elemento->estadorecepcion == '' ? 'selected' : ''}}>-- Valorar--</option>
                            @foreach ($estadosrecep as $estado )
                                <option value="{{ $estado->id }}" {{$elemento->estadorecepcion == $estado->id ? 'selected' : ''}}>{{ $estado->estado }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-2/12 px-1 ">
                        <textarea rows="3" name="obsrecepcion" class ="flex-1 block w-full py-1.5 text-xs transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300"
                            placeholder="Escribe tus comentarios">{{old('obsrecepcion', $elemento->obsrecepcion)}}</textarea>
                    </div>
                    <div class="w-8 text-center">
                        <button type="submit" class="text-center"><x-icon.save class="w-6 hover:scale-125"/></button>
                    </div>
                    <div class="w-1/12 ">
                        @if(file_exists( 'storage/galeria/'.$campaign->id.'/'.$elemento->imagen ))
                            <img src="{{asset('storage/galeria/'.$campaign->id.'/'.$elemento->imagen.'?'.time())}}"
                                alt={{$elemento->imagen}} title={{$elemento->imagen}} id="original"
                                class="p-1 mx-auto border-2 rounded-md shadow-md" style="height: 60px"/>
                        @else
                            <img src="{{asset('storage/pordefecto.jpg')}}" alt={{$elemento->imagen}}
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

