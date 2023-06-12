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
            <div class="flex {{ $ancho1 }} pt-2 pb-0 pl-2  text-sm font-bold tracking-tighter text-black bg-blue-100 rounded-tl-md">
                <div class="w-2/12">Campaña</div>
                <div class="w-3/12 flex-none text-center md:flex">
                    <div class="w-full text-center md:text-center md:w-6/12">F.Inicio</div>
                    <div class="w-full text-center md:text-center md:w-6/12">F.Fin</div>
                </div>
                <div class="w-4/12 flex-none md:flex">
                    <div class="w-full text-center md:text-center md:w-4/12" title="Fecha Montaje 1">F.Mon.1</div>
                    <div class="w-full text-center md:text-center md:w-4/12" title="Fecha Montaje 2">F.Mon.2</div>
                    <div class="w-full text-center md:text-center md:w-4/12" title="Fecha Montaje 2">F.Mon.3</div>
                </div>
                <div class="w-1/12 text-center">Estado</div>
            </div>
            <div class="{{ $ancho2 }}  pt-2 pb-0 pl-2  text-sm font-bold tracking-tighter text-black bg-blue-100 rounded-tr-md">
            </div>
        </div>
        @foreach ($campaigns as $campaign)
        <div class="flex">
            <div onclick="location.href = '{{ route('campaign.edit', $campaign->id) }}'"
                class="w-9/12 lg:w-9/12 flex py-0 pl-2 mt-2  text-sm tracking-tighter text-gray-500 border-b border-1 items-center cursor-pointer hover:bg-gray-200">
                <div class="w-2/12">{{$campaign->campaign_name}}</div>
                <div class="w-3/12 flex-none md:flex">
                    <div class="w-full text-center md:text-center md:w-6/12">{{$campaign->campaign_initdate}}</div>
                    <div class="w-full text-center md:text-center md:w-6/12">{{$campaign->campaign_enddate}}</div>
                </div>
                <div class="w-4/12 text-center flex-none md:flex">
                    <div class="w-full text-center md:text-right md:w-4/12">
                        <div class="text-center ">{{$campaign->fechainstal1}}</div>
                        <div class="text-center ">{{ $campaign->montaje1  }}</div>
                    </div>
                    <div class="w-full text-center md:text-right md:w-4/12">
                        <div class="text-center ">{{$campaign->fechainstal2}}</div>
                        <div class="text-center ">{{ $campaign->montaje2  }}</div>
                    </div>
                    <div class="w-full text-center md:text-right md:w-4/12">
                        <div class="text-center ">{{$campaign->fechainstal3}}</div>
                        <div class="text-center ">{{ $campaign->montaje3  }}</div>
                    </div>
                </div>
                <div class="w-1/12 text-center">{{$campaign->state['1']}}</div>
            </div>
            <div class="w-2/12 items-center text-right lg:w-3/12">
                <div class="hidden text-right lg:flex lg:w-full lg:space-x-6 lg:text-right">
                    @include('campaign.acciones')
                </div>
                <div class="text-center items-center lg:hidden">
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

<script>
    var select = document.getElementById('filtrocampaign');
    select.onchange = function(){
        this.form.submit();
    };

    var select = document.getElementById('search');
    select.onchange = function(){
        this.form.submit();
    };
</script>
@endpush

