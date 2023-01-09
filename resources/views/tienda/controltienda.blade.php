    <div class="">
        <div class="h-full p-1 mx-2">
            <div class="py-1 space-y-2">
                <div class="">
                    @include('errores')
                </div>
            </div>
            <div class="">
                aqui los filtros
                {{-- @include('tienda.tiendasfilters') --}}
            </div>
            <div class="mx-2 space-y-1 border rounded-md">
                <div class="flex w-full pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-gray-500 bg-blue-100 rounded-t-md">
                    <div class="w-1/12 text-left">#</div>
                    <div class="w-1/12 text-left">Campaña</div>
                    <div class="w-1/12 text-left">Fecha Inicio</div>
                    <div class="w-1/12 text-left">Fecha Fin Prevista</div>
                    <div class="w-1/12 text-left">Total</div>
                    <div class="w-1/12 text-left"><x-icon.question class="w-2 mb-1 text-black"></x-icon.question></div>
                    <div class="w-1/12 text-left"><x-icon.thumbs-up  class="w-4 mb-1 text-green-700"></x-icon.thumbs-up></div>
                    <div class="w-1/12 text-left"><x-icon.thumbs-down class="w-4 mb-1 text-red-700"></x-icon.thumbs-down></div>
                    <div class="w-1/12 text-left"></div>
                </div>
                @foreach($campaigns as $campaign)
                <div class="flex w-full space-x-1 text-sm text-gray-500 border-t-0 border-y ">
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$campaign->campaign->id}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$campaign->campaign->campaign_name}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$campaign->campaign->campaign_initdate}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$campaign->campaign->campaign_enddate}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$campaign->campaign->total}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$campaign->total-$campaign->OK-$campaign->KO}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$campaign->OK}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$campaign->KO}}</div>
                    <div class="flex w-1/12 my-2 space-x-2 text-left">
                        @can('tiendas.index')
                            <a href="{{route('tienda.campaignstores',$campaign->campaign ) }}" title="tiendas de la campaña"><x-icon.arrow-right></x-icon.arrow-right></a>
                        @endcan
                    </div>
                </div>
                @endforeach
                {{ $campaigns->appends(request()->except('page'))->links() }} &nbsp; &nbsp;
                        </div>
                    </div>
                </div>
            </div>
    </div>

@push('scriptchosen')


@endpush

