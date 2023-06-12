<div class="">
    <div class="p-1 mx-2">
        <div class="text-gray-500 border border-blue-300 shadow-md flex w-full p-1 bg-gray-100 rounded-md space-x-2">
            <div class="w-4/12 rounded-md ">
                <label for="campaign_name">Campaña</label>
                <input type="text" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                    name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                    disabled />
            </div>
            <div class="w-3/12 flex space-x-2">
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
            <div class="w-5/12 flex space-x-2">
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
    <div class="mx-2 mt-2 border rounded-md">
        <form action="{{ route('tienda.controlstores',$campaign->id) }}" method="GET">
        @csrf
        <div class="flex w-full pt-2 text-sm font-bold text-gray-500 bg-blue-100 rounded-t-md">
            <div class="w-1/12 pl-2">Luxottica</div>
            <div class="w-1/12">Store</div>
            <div class="w-3/12">Nombre</div>
            <div class="w-3/12">eMail</div>
            <div class="w-1/12 text-center ">nº Elementos</div>
            <div class="w-3/12 text-center flex-none lg:flex  ">
                <div class="w-full flex ml-2">
                    <x-icon.question class="w-2 mb-1 text-black "/>
                </div>
                <div class="w-full flex ml-2">
                    <x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/>
                    <input type="checkbox" {{ $ok=="1" ? 'checked' : '' }} name="ok" value="ok" class="mt-1" onclick="event.preventDefault(); this.closest('form').submit();"/>
                </div>
                <div class="w-full flex ml-2">
                    <x-icon.thumbs-down class="w-4 mb-1 text-red-500"/>
                    <input type="checkbox" {{ $ko=="1" ? 'checked' : '' }} name="ko" value="ko" class="mt-1" onclick="event.preventDefault(); this.closest('form').submit();"/>
                </div>
            </div>
        </div>
        </form>
        @foreach ($stores as $store)
            <div onclick="location.href = '{{ route('tienda.show',[$campaign,$store->tienda->id]) }}'"
                class="flex w-full py-1 text-sm text-gray-500 border-t-0 border-b cursor-pointer hover:bg-gray-100 ">
                <div class="w-1/12 pl-2">{{$store->tienda->luxotica}}</div>
                <div class="w-1/12">{{$store->tienda->id}}</div>
                <div class="w-3/12">{{$store->tienda->name}}</div>
                <div class="w-3/12"><a href="mailto:{{$store->tienda->email}}"><span class="text-blue-500 underline">{{$store->tienda->email}}</span>  </a></div>
                <div class="w-1/12 text-center">{{$store->elementos_count}}</div>
                <div class="w-3/12 text-center flex-none lg:flex  ">
                    <div class="w-full flex ml-2"><x-icon.question class="w-2 mb-1 text-black "/>{{$store->elementos_count-$store->elementosok_count-$store->elementosko_count}}</div>
                    <div class="w-full flex ml-2"><x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/>{{$store->elementosok_count}}</div>
                    <div class="w-full flex ml-2"><x-icon.thumbs-down  class="w-4 mb-1 text-red-500"/>{{$store->elementosko_count}}</div>
                </div>
                {{-- <div class="w-1/12 pr-2 text-right">{{$store->elementos_count-$store->elementosok_count-$store->elementosko_count}}</div>
                <div class="w-1/12 pr-2 text-right">{{$store->elementosok_count}}</div>
                <div class="w-1/12 pr-2 text-right">{{$store->elementosko_count}}</div> --}}
            </div>
        @endforeach
    </div>
</div>


@push('scriptchosen')

<script>

</script>

@endpush

