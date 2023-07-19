<div class="">
    <div class="p-1 mx-2">
        <div class="flex w-full p-1 space-x-2 text-gray-500 bg-gray-100 border border-blue-300 rounded-md shadow-md">
            <div class="w-7/12">
                @include('campaign.campaigncabecera')
            </div>
            <div class="flex w-5/12 text-gray-500 border border-blue-300 rounded shadow-md">
                <div class="w-4/12 mx-1">
                    <div class="text-center"><label for="fechainstal1">Fecha Montaje 1</label></div>
                    <div class="flex">
                        <input type="date" class="w-9/12  py-0.5 bg-gray-100 rounded-md" id="fechainstal1"
                        name="fechainstal1"
                        value="{{ old('fechainstal1',$campaign->fechainstal1) }}"
                        disabled />
                        <input type="text" class="w-3/12  py-0.5 bg-gray-100 rounded-md" id="montaje1"
                        name="montaje1"
                        value="{{ old('montaje1',$campaign->montaje1) }}"
                        disabled />
                    </div>
                </div>
                <div class="w-4/12 mx-1">
                    <div class="text-center"><label for="fechainstal2">Fecha Montaje 2</label></div>
                    <div class="flex">
                        <input type="date" class="w-9/12  py-0.5 bg-gray-100 rounded-md" id="fechainstal2"
                        name="fechainstal2"
                        value="{{ old('fechainstal2',$campaign->fechainstal2) }}"
                        disabled />
                        <input type="text" class="w-3/12  py-0.5 bg-gray-100 rounded-md" id="montaje2"
                        name="montaje2"
                        value="{{ old('montaje2',$campaign->montaje2) }}"
                        disabled />
                    </div>
                </div>
                <div class="w-4/12 mx-1">
                    <div class="text-center"><label for="fechainstal1">Fecha Montaje 3</label></div>
                    <div class="flex">
                        <input type="date" class="w-9/12  py-0.5 bg-gray-100 rounded-md" id="fechainstal3"
                        name="fechainstal3"
                        value="{{ old('fechainstal3',$campaign->fechainstal3) }}"
                        disabled />
                        <input type="text" class="w-3/12  py-0.5 bg-gray-100 rounded-md" id="montaje3"
                        name="montaje3"
                        value="{{ old('montaje3',$campaign->montaje3) }}"
                        disabled />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-2">
        <div class="flex items-center w-full py-1 pl-2 space-x-2">
            {{ $elementos->appends(request()->except('page'))->links() }}
        </div>
        <div class="m-2 mt-2 border rounded-md ">
            <form action="{{ route('tienda.show',$campaigntienda) }}" method="GET">
            @csrf
            <div class="flex w-full pt-2 text-sm font-bold text-gray-500 bg-blue-100 rounded-t-md">
                <div class="w-1/12 pl-2">Ubicación</div>
                <div class="w-1/12">Mobiliario</div>
                <div class="w-1/12">Prop x <br> Elemento</div>
                <div class="w-1/12">Carteleria</div>
                <div class="w-1/12">Medida</div>
                <div class="w-1/12">Material</div>
                <div class="w-1/12">Unit x Prop</div>
                <div class="flex-none w-1/12 text-center ">
                    {{-- <div class="flex w-full">
                        <div class="w-7"><x-icon.question class="w-2 mb-1 text-black "/></div>
                        <input type="checkbox" {{ $nose=="1" ? 'checked' : '' }} name="nose" value="ok" class="mt-1" onclick="event.preventDefault(); this.closest('form').submit();"/>
                    </div> --}}
                    <div class="flex w-full">
                        <div class="w-7"><x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/></div>
                        <input type="checkbox" {{ $ok=="1" ? 'checked' : '' }} name="ok" value="ok" class="mt-1" onclick="event.preventDefault(); this.closest('form').submit();"/>
                    </div>
                    <div class="flex w-full">
                        <div class="w-7"><x-icon.thumbs-down class="w-4 mb-1 text-red-500"/></div>
                        <input type="checkbox" {{ $ko=="1" ? 'checked' : '' }} name="ko" value="ko" class="mt-1" onclick="event.preventDefault(); this.closest('form').submit();"/>
                    </div>
                </div>
                <div class="flex-none w-3/12 lg:flex">
                    <div class="w-full lg:w-4/12 text">Estado</div>
                    <div class="w-full lg:w-8/12">Descrip.Estado</div>
                </div>
                <div class="w-1/12"></div>
            </div>
            </form>
            @foreach ($elementos as $elemento)
            <div class="flex items-center w-full py-1 text-sm text-gray-500 border-t-0 border-b hover:bg-gray-100 ">
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
                <div class="flex-none w-3/12 lg:flex">
                    <div class="w-full lg:w-4/12">{{ $elemento->estadorecep->estado ?? '' }}</div>
                    <div class="w-full lg:w-8/12">{{ $elemento->obsrecepcion }}</div>
                </div>
                <div class="w-1/12 mx-auto text-center">
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
            @endforeach
        </div>
    </div>
</div>


@push('scriptchosen')

<script>

</script>

@endpush

