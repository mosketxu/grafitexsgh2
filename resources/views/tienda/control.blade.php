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
            <div class="flex w-full pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-gray-500 bg-blue-100 rounded-t-md">
                <div class="w-1/12 text-left">#</div>
                <div class="w-4/12 text-left">Campaña</div>
                <div class="w-1/12 text-left">Fecha Inicio</div>
                <div class="w-1/12 text-left">Fecha Fin Prevista</div>
                <div class="w-1/12 text-right">Total</div>
                <div class="flex flex-row-reverse w-1/12"><x-icon.question class="w-2 mb-1 text-black "/></div>
                <div class="flex flex-row-reverse w-1/12"><x-icon.thumbs-up  class="w-4 mb-1 text-green-500"></x-icon.thumbs-up></div>
                <div class="flex flex-row-reverse w-1/12"><x-icon.thumbs-down class="w-4 mb-1 text-red-500"></x-icon.thumbs-down></div>
                <div class="flex flex-row-reverse w-1/12"></div>
            </div>
            @foreach($campaigns as $campaign)
            <div class="flex w-full space-x-1 text-sm text-gray-500 border-t-0 border-y ">
                <div class="flex-wrap w-1/12 pl-2 my-2 text-left">{{$campaign->campaign->id}}</div>
                <div class="flex-wrap w-4/12 my-2 text-left">{{$campaign->campaign->campaign_name}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$campaign->campaign->campaign_initdate}}</div>
                <div class="flex-wrap w-1/12 my-2 text-left">{{$campaign->campaign->campaign_enddate}}</div>
                <div class="flex-wrap w-1/12 my-2 text-right">{{$campaign->total}}</div>
                <div class="flex-wrap w-1/12 my-2 text-right">{{$campaign->total-$campaign->OK-$campaign->KO}}</div>
                <div class="flex-wrap w-1/12 my-2 text-right">{{$campaign->OK}}</div>
                <div class="flex-wrap w-1/12 my-2 text-right">{{$campaign->KO}}</div>
                <div class="flex flex-row-reverse w-1/12 pr-2">
                    @can('tiendas.index')
                        <a href="{{route('tienda.controlstores',$campaign->campaign ) }}" title="tiendas de la campaña"><x-icon.arrow-right class="text-green-500"/></a>
                    @endcan
                </div>
            </div>
            @endforeach
            <div class=""></div>
        </div>
    </div>
</div>

@push('scriptchosen')


@endpush

