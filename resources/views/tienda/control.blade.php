<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
        <div class="flex">
            <div class="flex items-center w-8/12 space-x-2">
                {{ $campaigns->appends(request()->except('page'))->links() }}
            </div>
            <div class="flex flex-row-reverse items-center w-4/12 mb-1">
                <form method="GET" action="{{route('tienda.control') }}">
                    <input id="busca" name="busca" type="search" value='{{$busqueda}}' placeholder="Búsqueda por campaña"
                    class="flex-1 block w-full py-1 pl-2 transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300']"/>
                </form>
            </div>
        </div>
        <div class="mx-2 space-y-1 border rounded-md">
            <form action="{{ route('tienda.control') }}" method="GET">
                @csrf
                <div class="flex w-full pt-2 text-sm font-bold text-gray-500 bg-blue-100 rounded-t-md">
                    {{-- <div class="w-1/12 pl-2">#</div> --}}
                    <div class="w-3/12 pl-2 ">Campaña</div>
                    <div class="flex-none w-2/12 lg:flex ">
                        <div class="w-full text-center lg:w-6/12">F.Inicio</div>
                        <div class="w-full text-center lg:w-6/12">F.Fin</div>
                        <div class="w-full text-center lg:w-6/12">F.Tienda</div>
                    </div>
                    <div class="flex-none w-3/12 lg:flex ">
                        <div class="w-full text-center lg:w-4/12" title="Fecha Montaje 1">F.Mon.1</div>
                        <div class="w-full text-center lg:w-4/12" title="Fecha Montaje 2">F.Mon.2</div>
                        <div class="w-full text-center lg:w-4/12" title="Fecha Montaje 2">F.Mon.3</div>
                    </div>
                    <div class="w-1/12 text-center ">nº Elementos</div>
                    <div class="flex-none w-3/12 text-center lg:flex ">
                        {{-- <div class="flex w-full ml-2">
                            <x-icon.question class="w-2 mb-1 text-black "/>
                        </div> --}}
                        <div class="flex w-full ml-2">
                            <x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/>
                            <input type="checkbox" {{ $ok=="1" ? 'checked' : '' }} name="ok" value="ok" class="mt-1" onclick="event.preventDefault(); this.closest('form').submit();"/>
                        </div>
                        <div class="flex w-full ml-2">
                            <x-icon.thumbs-down class="w-4 mb-1 text-red-500"/>
                            <input type="checkbox" {{ $ko=="1" ? 'checked' : '' }} name="ko" value="ko" class="mt-1" onclick="event.preventDefault(); this.closest('form').submit();"/>
                        </div>
                    </div>
                </div>
            </form>
            @foreach($campaigns as $campaign)
            @can('tiendas.index')
                <div onclick="location.href = '{{ route('tienda.controlstores',$campaign->campaign) }}'" class="flex w-full text-sm text-gray-500 border-t-0 border-b cursor-pointer hover:bg-gray-100 ">
            @else
                <div class="flex w-full text-sm text-gray-500 border-t-0 border-b hover:bg-gray-100 ">
            @endcan
                {{-- <div class="w-1/12 pl-2 text-left">{{$campaign->campaign->id}}</div> --}}
                <div class="w-3/12 pl-2 text-left ">{{$campaign->campaign->campaign_name}}</div>
                <div class="flex-none w-2/12 lg:flex ">
                    <div class="w-full text-center text-blue-500 lg:w-6/12">{{$campaign->campaign->campaign_initdate}}</div>
                    <div class="w-full text-center text-green-500 lg:w-6/12">{{$campaign->campaign->campaign_enddate}}</div>
                    <div class="w-full text-center text-orange-500 lg:w-6/12">{{$campaign->campaign->fechaentregatienda}}</div>
                </div>
                <div class="flex-none w-3/12 text-center lg:flex ">
                    <div class="w-full text-center lg:w-4/12">
                        <div class="text-center ">{{$campaign->campaign->fechainstal1}}</div>
                        <div class="text-center ">{{ $campaign->campaign->montaje1  }}</div>
                    </div>
                    <div class="w-full text-center lg:w-4/12">
                        <div class="text-center ">{{$campaign->campaign->fechainstal2}}</div>
                        <div class="text-center ">{{ $campaign->campaign->montaje2  }}</div>
                    </div>
                    <div class="w-full text-center lg:w-4/12">
                        <div class="text-center ">{{$campaign->campaign->fechainstal3}}</div>
                        <div class="text-center ">{{ $campaign->campaign->montaje3  }}</div>
                    </div>
                </div>
                <div class="w-1/12 text-center ">{{$campaign->elementos_count}}</div>
                <div class="flex-none w-3/12 text-center lg:flex ">
                    <div class="flex w-full ml-2"><x-icon.question class="w-2 mb-1 text-black "/>{{$campaign->elementos_count-$campaign->elementosok_count-$campaign->elementosko_count}}</div>
                    <div class="flex w-full ml-2"><x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/>{{$campaign->elementosok_count}}</div>
                    <div class="flex w-full ml-2"><x-icon.thumbs-down  class="w-4 mb-1 text-red-500"/>{{$campaign->elementosko_count}}</div>
                </div>
            </div>
            @endforeach
            <div class=""></div>
        </div>
    </div>
</div>

@push('scriptchosen')


@endpush

