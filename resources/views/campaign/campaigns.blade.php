<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
    </div>

    <div class="pb-0 mx-2 space-y-1 border rounded-md">
        {{-- Datos campañas --}}
        {{-- titulos --}}
        <div class="flex">
            <div class="flex w-9/12 pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-blue-100 rounded-tl-md">
                <div class="w-3/12">Campaña</div>
                <div class="w-3/12 flex-none md:flex">
                    <div class="w-full text-center md:text-right md:w-6/12">F.Inicio</div>
                    <div class="w-full text-center md:text-right md:w-6/12">F.Fin</div>
                </div>
                <div class="w-4/12 flex-none md:flex">
                    <div class="w-full text-center md:text-right md:w-4/12">F.Montaje 1</div>
                    <div class="w-full text-center md:text-right md:w-4/12">F.Montaje 2</div>
                    <div class="w-full text-center md:text-right md:w-4/12">F.Montaje 3</div>
                </div>
                <div class="w-2/12 text-center">Estado</div>
            </div>
            <div class="w-3/12  pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-black bg-blue-100 rounded-tr-md">

            </div>
        </div>
        @foreach ($campaigns as $campaign)
        <div class="flex">
            <div onclick="location.href = '{{ route('campaign.edit', $campaign->id) }}'"
                class="flex w-9/12 py-0 pl-2 mt-2 space-x-1 text-sm tracking-tighter text-gray-500 border-b border-1 items-center cursor-pointer hover:bg-gray-200">
                <div class="w-3/12">{{$campaign->campaign_name}}</div>
                <div class="w-3/12 flex-none md:flex">
                    <div class="w-full text-center md:text-right md:w-6/12">{{$campaign->campaign_initdate}}</div>
                    <div class="w-full text-center md:text-right md:w-6/12">{{$campaign->campaign_enddate}}</div>
                </div>
                <div class="w-4/12 flex-none md:flex">
                    <div class="w-full text-center md:text-right md:w-4/12">{{$campaign->fechainstal1}} {{ $campaign->montaje1  }}</div>
                    <div class="w-full text-center md:text-right md:w-4/12">{{$campaign->fechainstal2}} {{ $campaign->montaje2  }}</div>
                    <div class="w-full text-center md:text-right md:w-4/12">{{$campaign->fechainstal3}} {{ $campaign->montaje3  }}</div>
                </div>
                <div class="w-2/12 text-center">{{$campaign->campaign_state}}</div>
            </div>
            <div class="w-3/12 flex">
                <div class="hidden md:flex ">
                    @include('campaign.acciones')
                </div>
                <div class="flex md:hidden">
                    @livewire('campaigns.modal-acciones',['campaign'=>$campaign])
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
    <div class="mx-2 my-1">
        {{ $campaigns->appends(request()->except('page'))->links() }}
    </div>

@push('scriptchosen')


@endpush

