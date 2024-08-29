<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-0 space-y-2">
            <div class="">
                @include('errores')
            </div>
            <div class="">
                {{-- @include('filtros si toca') --}}
            </div>
            {{-- datos de la store --}}
            <div class="flex-col space-y-1 text-gray-500 border border-blue-300 rounded shadow-md">
                <form action="{{ route('stores.update',$store) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-1 rounded-md bg-blue-50">
                        <h3 class="pl-1 font-semibold">Datos generalses</h3>
                    </div>
                    <div class="flex w-full">
                        <div class="w-9/12 p-1 m-1 space-y-1">
                            <div class="flex flex-col mx-2 space-y-1 md:space-y-0 md:flex-row md:space-x-2">
                                {{-- Code --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="id">{{ __('Code') }}</x-jet-label>
                                    <x-input.text name="id" value="{{old('id',$store->id)}}" class="py-1"/>
                                </div>
                                {{-- nombre --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="name">{{ __('Nombre') }}</x-jet-label>
                                    <x-input.text name="name" value="{{old('name',$store->name)}}" class="py-1"/>
                                </div>
                                {{-- luxotica --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="country">Luxottica</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="luxotica" selectname="luxotica" name="luxotica" >
                                        <option value="">No definido</option>
                                        <option value="Oliver Peoples" {{$store->luxotica =="Oliver Peoples" ? 'selected' : ''}}>Oliver Peoples</option>
                                        <option value="Ray-Ban Store" {{$store->luxotica =="Ray-Ban Store" ? 'selected' : ''}}>Ray-Ban Store</option>
                                        <option value="Sunglass Hut" {{$store->luxotica =="Sunglass Hut" ? 'selected' : ''}}>Sunglass Hut</option>
                                    </x-select>
                                </div>
                                {{-- tipo --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="tipo">Tienda Tipo</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="tiendatipo_id" selectname="tiendatipo_id" name="tiendatipo_id" >
                                        <option value="">-- Selecciona --</option>
                                        @foreach ($tiendatipos as $tipo )
                                            <option value="{{$tipo->id}}" {{$store->tiendatipo_id==$tipo->id ? 'selected' : ''}}>{{$tipo->tiendatipo}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                {{-- montaje --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="tipo">Montaje Tipo</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="montajetipo_id" selectname="montajetipo_id" name="montajetipo_id" >
                                        <option value="">-- Selecciona --</option>
                                        @foreach ($montajetipos as $tipo )
                                            <option value="{{$tipo->id}}" {{$store->montajetipo_id==$tipo->id ? 'selected' : ''}}>{{$tipo->montajetipo}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                {{-- country --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="country">Country</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="country" selectname="country" name="country" >
                                        <option value="ES" {{old('country','ES'==$store->country) ? 'selected' : ''}}>ES</option>
                                        <option value="PT" {{old('country','PT'==$store->country) ? 'selected' : ''}}>PT</option>
                                    </x-select>
                                </div>
                                {{-- Idioma --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="country">Idioma</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="idioma" selectname="idioma" name="idioma" >
                                        <option value="ES" {{old('idioma','ES'==$store->idioma) ? 'selected' : ''}}>ES</option>
                                        <option value="CAT" {{old('idioma','CAT'==$store->idioma) ? 'selected' : ''}}>CAT</option>
                                        <option value="PT" {{old('idioma','PT'==$store->idioma) ? 'selected' : ''}}>PT</option>
                                    </x-select>
                                </div>
                            </div>
                            <div class="flex flex-col mx-2 space-y-1 md:space-y-0 md:flex-row md:space-x-2">
                                {{-- area --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="area">Area</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="area_id" selectname="area_id" name="area_id" >
                                        @foreach($areas as $area )
                                        <option value="{{$area->id}}" {{old('area_id',$area->id==$store->area_id) ? 'selected' : ''}}>{{$area->area}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                {{-- segmento --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="segmento">Segmento</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="segmento" selectname="segmento" name="segmento" >
                                        @foreach($segmentos as $segmento )
                                        <option value="{{$segmento->segmento}}" {{old('segmento',$segmento->segmento==$store->segmento) ? 'selected' : ''}}>{{$segmento->segmento}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                {{-- channel --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="channel">Channel</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="channel" selectname="channel" name="channel" >
                                        @foreach($channels as $channel )
                                        <option value="{{$channel->channel}}" {{old('channel',$channel->channel==$store->channel) ? 'selected' : ''}}>{{$channel->channel}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                {{-- cluster --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="store_cluster">Cluster</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="store_cluster" selectname="store_cluster" name="store_cluster" >
                                        @foreach($storeclusters as $store_cluster )
                                            <option value="{{$store_cluster->store_cluster}}" {{old('store_cluster',$store_cluster->store_cluster==$store->store_cluster) ? 'selected' : ''}}>{{$store_cluster->store_cluster}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                {{-- concepto --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="concepto">Concepto</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="concepto_id" selectname="concepto_id" name="concepto_id" >
                                        @foreach($conceptos as $concepto )
                                        <option value="{{$concepto->id}}" {{old('concepto_id',$concepto->id==$store->concepto_id) ? 'selected' : ''}}>{{$concepto->storeconcept}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                {{-- furniture --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="furniture_type">Furniture Type</x-jet-label>
                                    <x-select class="w-full py-1.5 border-blue-300"  id="furniture_type" selectname="furniture_type" name="furniture_type" >
                                        {{-- {{ $furnitures }} --}}
                                        @foreach($furnitures as $furniture )
                                        <option value="{{$furniture->furniture_type}}" {{old('furniture_type',$furniture->furniture_type==$store->furniture_type) ? 'selected' : ''}}>{{$furniture->furniture_type}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>
                            <div class="flex flex-col mx-2 space-y-1 md:space-y-0 md:flex-row md:space-x-2">
                                {{-- address --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="address">Address</x-jet-label>
                                    <x-input.text name="address" value="{{old('address',$store->address)}}" class="py-1"/>
                                </div>
                                {{-- city --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="city">City</x-jet-label>
                                    <x-input.text name="city" value="{{old('city',$store->city)}}" class="py-1"/>
                                </div>
                                {{-- cp --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="cp">C.P</x-jet-label>
                                    <x-input.text name="cp" value="{{old('cp',$store->cp)}}" class="py-1"/>
                                </div>
                                {{-- provincia --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="province">Provincia</x-jet-label>
                                    <x-input.text name="province" value="{{old('province',$store->province)}}" class="py-1"/>
                                </div>
                            </div>
                            <div class="flex flex-col mx-2 space-y-1 md:space-y-0 md:flex-row md:space-x-2">
                                {{-- phone --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="phone">phone</x-jet-label>
                                    <x-input.text name="phone" value="{{old('phone',$store->phone)}}" class="py-1"/>
                                </div>
                                {{-- email --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="email">email</x-jet-label>
                                    <x-input.text name="email" value="{{old('email',$store->email)}}" class="py-1"/>
                                </div>
                                {{-- winter schedule --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="winterschedule">Winter Schedule</x-jet-label>
                                    <x-input.text name="winterschedule" value="{{old('winterschedule',$store->winterschedule)}}" class="py-1"/>
                                </div>
                                {{-- summe schedule --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="summerschedule">Summer Schedule</x-jet-label>
                                    <x-input.text name="summerschedule" value="{{old('summerschedule',$store->summerschedule)}}" class="py-1"/>
                                </div>
                                {{-- delivery time --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="deliverytime">deliverytime</x-jet-label>
                                    <x-input.text name="deliverytime" value="{{old('deliverytime',$store->deliverytime)}}" class="py-1"/>
                                </div>
                            </div>
                            <div class="flex flex-col mx-2 space-y-1 md:space-y-0 md:flex-row md:space-x-2">
                                {{-- observaciones --}}
                                <div class="w-full form-item">
                                    <x-jet-label for="observaciones">observaciones</x-jet-label>
                                    <x-input.text name="observaciones" value="{{old('observaciones',$store->observaciones)}}" class="py-1"/>
                                </div>
                            </div>
                            @hasanyrole('admin|grafitex')
                            <div class="flex flex-col mx-2 space-y-1 bg-green-400 rounded-md md:space-y-0 md:flex-row md:space-x-2">
                                <div class="flex w-full m-1 space-x-1 rounded-b-md">
                                    <div class="items-center w-2/12 my-auto ml-2 text-center">
                                        <x-jet-label for="furniture_type">Montador favorito</x-jet-label>
                                    </div>
                                    <x-select class="w-10/12 py-1.5 border-blue-300"  id="montador_id" selectname="montador_id" name="montador_id" >
                                        <option value="">-- Selecciona el montador favorito--</option>
                                        @foreach($montadores as $montador )
                                        <option value="{{$montador->id}}" {{old('montador_id',$montador->id==$store->montador_id) ? 'selected' : ''}}>{{$montador->entidad}}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>
                            @endhasanyrole
                        </div>
                        <div class="3/12">
                            {{-- imagen --}}
                            <div class="w-full space-y-3 form-item">
                                <div class="my-2 border rounded-md ">
                                    <img src="{{asset('storage/store/'.$store->imagen)}}" alt={{$store->imagen}} title={{$store->imagen}}
                                    class="img-fluid img-thumbnail" style="max-height: 200px; ">
                                </div>
                                <input type="hidden" selectname="imagen" name="imagen" value="{{$store->imagen}}" readonly>
                                @can('stores.edit')
                                <input type="file" selectname="photo" name="photo" value="">
                                @endcan
                            </div>
                        </div>
                    </div>
                    {{-- botones --}}
                    <div class="m-2">
                        @can('stores.edit')
                        <x-jet-button type="submit" class="bg-blue-700 hover:bg-blue-900" >
                            {{ __('Guardar') }}
                        </x-jet-button>
                        @endcan
                        <x-button.button  class="py-2" onclick="location.href = '{{ route('stores.addresses') }}'" color="green" >{{ __('Volver a direcciones') }}</x-button.button>
                        <x-button.button  class="py-2 text-black" onclick="location.href = '{{ route('stores.index') }}'" color="gray" >{{ __('Volver a stores') }}</x-button.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scriptchosen')

@endpush
