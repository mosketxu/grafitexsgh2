<div class="">
    <div class="mx-2">
        <div class="text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex w-full bg-gray-100 rounded-md">
                <div class="w-6/12 rounded-md">
                    <label for="campaign_name">Campaña</label>
                    <input type="text" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                        name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_initdate">Fecha Inicio</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_initdate"
                        name="campaign_initdate"
                        value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_enddate">Fecha Finalización</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_enddate"
                        name="campaign_enddate"
                        value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                        disabled />
                </div>
            </div>
        </div>
    </div>
    <div class="mx-2">
        <div class="flex items-center w-full py-1 pl-2 space-x-2">
            {{ $elementos->appends(request()->except('page'))->links() }}
        </div>
        <div class="w-full h-3/5">
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black">
                    <tr class="flex w-full px-2">
                        <th class="w-1/12">Ubicación</th>
                        <th class="w-1/12">Mobiliario</th>
                        <th class="w-1/12">Prop x <br> Elemento</th>
                        <th class="w-1/12">Carteleria</th>
                        <th class="w-1/12">Medida</th>
                        <th class="w-1/12">Material</th>
                        <th class="w-1/12">Unit x Prop</th>
                        <th class="w-3/12 text-center">
                            <div class="">Estado</div>
                            <div class="flex justify-between">
                                <div class="flex w-3/12 ">
                                    <form action="{{route('tienda.show',[$campaign,$store])}}" class="mx-auto">
                                        <input type="hidden" name="busqueda" value="total">
                                        <button type="submit"  class="w-full p-1 "> Total: <br>{{$total}} </button>
                                    </form>
                                </div>
                                <div class="flex w-3/12 ">
                                    <form action="{{route('tienda.show',[$campaign,$store])}}" class="mx-auto">
                                        <input type="hidden" name="busqueda" value="nv">
                                        <button type="submit"  class="w-full p-1 "> <x-icon.question class="w-2 mb-1 text-white"/> {{$sinvalorar}}</span></button>
                                    </form>
                                </div>
                                <div class="flex w-3/12 ">
                                    <form action="{{route('tienda.show',[$campaign,$store])}}" class="mx-auto">
                                        <input type="hidden" name="busqueda" value="OK">
                                        <button type="submit"  class="enlace"><x-icon.thumbs-up  class="w-4 mt-1 text-white"/> {{$correctos}}</span> </button>
                                    </form>
                                </div>
                                <div class="flex w-3/12 ">
                                    <form action="{{route('tienda.show',[$campaign,$store])}}" class="mx-auto">
                                        <input type="hidden" name="busqueda" value="KO">
                                        <button type="submit" ><x-icon.thumbs-down class="w-4 mt-1 text-white"/> {{$incidencias}}</span> </button>
                                    </form>
                                </div>
                            </div>
                        </th>
                        <th class="w-2/12"></th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 55vh;">
                    @foreach ($elementos as $elemento)
                    <tr class="flex w-full px-2">
                        <td class="w-1/12">{{$elemento->ubicacion}}</td>
                        <td class="w-1/12">{{$elemento->mobiliario}}</td>
                        <td class="w-1/12">{{$elemento->propxelemento}}</td>
                        <td class="w-1/12">{{$elemento->carteleria}}</td>
                        <td class="w-1/12">{{$elemento->medida}}</td>
                        <td class="w-1/12">{{$elemento->material}}</td>
                        <td class="w-1/12">{{$elemento->unitxprop}}</td>
                        <td class="flex w-3/12">
                            <div class="">
                                <span id="estado{{$elemento->id}}">
                                    @if($elemento->estadorecepcion=='1')
                                    <x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/>
                                    @elseif($elemento->estadorecepcion>'1')
                                    <x-icon.thumbs-down  class="w-4 mb-1 text-red-500"/>
                                    @else
                                    <x-icon.question class="w-2 mb-1 text-black"/>
                                    @endif
                                <span>
                            </div>
                            <div class="mx-auto">
                                @if($elemento->estadorecepcion=="0")
                                    -
                                @elseif ($elemento->estadorecepcion=="1")
                                    OK
                                @elseif ($elemento->estadorecepcion=="2")
                                    No recibido
                                @elseif ($elemento->estadorecepcion=="3")
                                    Defectuoso
                                @elseif ($elemento->estadorecepcion=="4")
                                    Idioma incorrecto
                                @endif
                            </div>
                        </td>
                        <td class="w-2/12 mx-auto text-center">
                            @if(file_exists( 'storage/galeria/'.$campaign->id.'/'.$elemento->imagen ))
                                <img src="{{asset('storage/galeria/'.$campaign->id.'/'.$elemento->imagen.'?'.time())}}"
                                    alt={{$elemento->imagen}} title={{$elemento->imagen}} id="original"
                                    class="p-1 mx-auto border-2 rounded-md shadow-md" style="height: 60px"/>
                            @else
                                <img src="{{asset('storage/pordefecto.jpg')}}" alt={{$elemento->imagen}}
                                    title={{$elemento->imagen}} id="original" class="p-1 mx-auto border-2 rounded-md shadow-md"
                                    style="height: 60px"/>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@push('scriptchosen')

<script>

</script>

@endpush

