<div class="">
    <div class="flex p-1 mx-2">
        <div class="flex w-full p-1 space-x-2 text-gray-500 bg-gray-100 border border-blue-300 rounded-md shadow-md">
            <div class="w-7/12">
                @include('campaign.campaigncabecera')
            </div>
            <div class="w-5/12">
                @include('campaign.campaigncabecerafechasmontaje')
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
            <div class="flex-none w-3/12 text-center lg:flex ">
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
        @foreach ($stores as $store)
        {{-- {{ $store }} --}}
            <div onclick="location.href = '{{ route('tienda.show',[$store]) }}'"
            {{-- <div onclick="location.href = '{{ route('tienda.show',[$store->camptiendastoreId]) }}'" --}}
                class="flex w-full py-1 text-sm text-gray-500 border-t-0 border-b cursor-pointer hover:bg-gray-100 ">
                <div class="w-1/12 pl-2">{{$store->tienda->luxotica}}</div>
                <div class="w-1/12">{{$store->tienda->id}}</div>
                <div class="w-3/12">{{$store->tienda->name}}</div>
                <div class="w-3/12"><a href="mailto:{{$store->tienda->email}}"><span class="text-blue-500 underline">{{$store->tienda->email}}</span>  </a></div>
                <div class="w-1/12 text-center">{{$store->elementos_count}}</div>
                <div class="flex-none w-3/12 text-center lg:flex ">
                    {{-- <div class="flex w-full ml-2"><x-icon.question class="w-2 mb-1 text-black "/>{{$store->elementos_count-$store->elementosok_count-$store->elementosko_count}}</div> --}}
                    {{-- <div class="flex w-full ml-2"><x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/>{{$store->elementos->sum('OK')}}</div> --}}
                    <div class="flex w-full ml-2"><x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/>{{$store->elementosok_count}}</div>
                    {{-- <div class="flex w-full ml-2"><x-icon.thumbs-down  class="w-4 mb-1 text-red-500"/>{{$store->elementos->sum('KO')}}</div> --}}
                    <div class="flex w-full ml-2"><x-icon.thumbs-down  class="w-4 mb-1 text-red-500"/>{{$store->elementosko_count}}</div>
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

