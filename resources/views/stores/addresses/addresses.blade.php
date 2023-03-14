<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
        <div class="">
            @include('stores.addresses.addressesfilters')
        </div>
        <div class="space-y-1 border rounded-md">
            <div class="flex w-full pt-2 pb-0 pl-2 space-x-1 text-sm font-bold tracking-tighter text-gray-500 bg-blue-100 rounded-t-md">
                {{-- <div class="w-1/12 text-left">Luxottica</div> --}}
                <div class="w-1/12 text-left">Country</div>
                <div class="w-1/12 text-left">Store</div>
                <div class="w-2/12 text-left">Nombre</div>
                <div class="w-2/12 text-left">Dirección</div>
                <div class="w-1/12 text-left">City</div>
                <div class="w-1/12 text-left">Province</div>
                <div class="w-1/12 text-left">Postal Code</div>
                <div class="w-1/12 text-left">Phone</div>
                <div class="w-1/12 text-left">email</div>
                @can('stores.edit')
                    <div class="w-10" ></div>
                @endcan
            </div>
            <div class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 60vh;">
                @foreach ($stores as $store)
                <div class="flex w-full space-x-1 text-sm text-gray-500 border-t-0 border-y " wire:loading.class.delay="opacity-50">
                    <input type="hidden" id="id" name="id" value="{{$store->id}}">
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$store->luxotica}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$store->id}}</div>
                    <div class="flex-wrap w-2/12 my-2 text-left">{{$store->name}}</div>
                    <div class="flex-wrap w-2/12 my-2 text-left">{{$store->address}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$store->city}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$store->province}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$store->cp}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left">{{$store->phone}}</div>
                    <div class="flex-wrap w-1/12 my-2 text-left break-words">{{$store->email}}</div>
                    @can('stores.edit')
                    <div class="w-10 pl-3 mt-2">
                        <a href="{{route('stores.edit',$store)}}" class="text-blue-500 scale-125 hover:text-blue-900 hover:" ><x-icon.edit  title="Editar tienda"/></a>
                    </div>
                    @endcan
                </div>
                @endforeach
            </div>
            <div class="">
                {{ $stores->appends(request()->except('page'))->links() }}
            </div>
        </div>
        {{-- botones --}}
        <div class="">
            <x-button.button  class="py-2" onclick="location.href = '{{ route('stores.addresses') }}'" color="green" >{{ __('Volver a direcciones') }}</x-button.button>
            <x-button.button  class="py-2 text-black" onclick="location.href = '{{ route('stores.index') }}'" color="gray" >{{ __('Volver a stores') }}</x-button.button>
        </div>
    </div>
</div>

@push('scriptchosen')

<script>
    $(document).ready( function () {
    });
</script>

<script>
  new TomSelect('#select-code', {maxItems: 10,});
  new TomSelect('#select-name', {maxItems: 10,});
</script>

@endpush

