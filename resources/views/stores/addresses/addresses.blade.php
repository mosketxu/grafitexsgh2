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
        <div class="flex-col space-y-4">
            <div>
                <div class="flex w-full py-1 mt-1 text-sm font-bold text-gray-500 bg-blue-100 rounded-t-md">
                    <div class="w-2/12 pl-2 text-left md:w-1/12">Luxottica</div>
                    <div class="w-1/12 pl-2 text-left md:w-1/12">Store</div>
                    <div class="w-3/12 pl-2 text-left md:w-1/12">Nombre</div>
                    <div class="hidden pl-2 text-left md:w-2/12 md:flex">Dirección</div>
                    <div class="w-2/12 pl-2 text-left md:w-1/12">City</div>
                    <div class="hidden pl-2 text-left md:w-2/12 md:flex">Province</div>
                    <div class="hidden pl-2 text-left md:w-1/12">Postal Code</div>
                    <div class="hidden pl-2 text-left md:w-1/12">Phone</div>
                    <div class="w-3/12 pl-2 text-left md:w-2/12">email</div>
                </div>
                {{-- <div style="height: 60vh;" > --}}
                <div  >
                    @foreach ($stores as $store)
                    @can('stores.edit')
                    <div class="flex w-full text-sm text-gray-500 border-t-0 border-y hover:bg-gray-100 hover:cursor-pointer" wire:loading.class.delay="opacity-50" onclick="location.href = '{{ route('stores.edit',$store) }}'">
                    @else
                    <div class="flex w-full text-sm text-gray-500 border-t-0 border-y hover:bg-gray-100 hover:cursor-pointer" wire:loading.class.delay="opacity-50">
                    @endcan
                        <input type="hidden" id="id" name="id" value="{{$store->id}}">
                        <div class="w-2/12 pl-2 text-left md:w-1/12">{{$store->luxotica}}</div>
                        <div class="w-1/12 pl-2 text-left md:w-1/12">{{$store->id}}</div>
                        <div class="w-3/12 pl-2 text-left md:w-2/12">{{$store->name}}</div>
                        <div class="hidden pl-2 text-left md:w-2/12 md:flex">{{$store->address}}</div>
                        <div class="w-2/12 pl-2 text-left md:w-1/12 md:flex">{{$store->city}}</div>
                        <div class="hidden pl-2 text-left md:w-1/12 md:flex">{{$store->province}}</div>
                        <div class="hidden pl-2 text-left md:w-1/12">{{$store->cp}}</div>
                        <div class="hidden pl-2 text-left md:w-1/12">{{$store->phone}}</div>
                        <div class="w-3/12 pl-2 text-left break-words md:w-1/12">{{$store->email}}</div>
                    </div>
                    @endforeach
                </div>
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

