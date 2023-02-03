<div class="">
    <x-input.text type="text" class="hidden" id="campaign" name="campaign" value="{{$campaign->id}}"/>
    <input type="text" class="hidden" id="campelemento" name="campelemento" value="{{$campelemento->id}}"/>
    <div class="flex">
        <div class="flex w-9/12 p-2 m-2 border border-blue-500 rounded-md shadow-md">
            <div class="w-6/12 p-2 space-y-1 ">
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label for="store">Store</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" readonly  id="Store" name="store" value="{{$campelemento->store}} - {{$campelemento->name}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="country">Country</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="country" name="country" value="{{$campelemento->country}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="area">Area</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="area" name="area" value="{{$campelemento->area}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="segmento">Segmento</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="segmento" name="segmento" value="{{$campelemento->segmento}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="storeconcept">Storeconcept</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="storeconcept" name="storeconcept" value="{{$campelemento->storeconcept}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="observaciones">Observaciones</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 " type="text"  id="observaciones" name="observaciones" wire:model.defer="observaciones"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="precio">Precio</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 " type="number" step=0.01  id="precio" name="precio" wire:model.defer="precio"/>
                    </div>
                </div>
            </div>
            <div class="w-6/12 p-2 space-y-1 ">
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="ubicacion">Ubicación</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="ubicacion" name="ubicacion" value="{{$campelemento->ubicacion}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="mobiliario">Mobiliario</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="mobiliario" name="mobiliario" value="{{$campelemento->mobiliario}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="propxelemento">Prop x Elemento</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="propxelemento" name="propxelemento" value="{{$campelemento->propxelemento}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="carteleria">Carteleria</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="carteleria" name="carteleria" value="{{$campelemento->carteleria}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="medida">Medida</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="medida" name="medida" value="{{$campelemento->medida}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="material">Material</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="material" name="material" value="{{$campelemento->material}}"/>
                    </div>
                </div>
                <div class="flex ml-2">
                    <div class="w-2/12">
                        <x-jet-label class="" for="unitxprop">Unit x Prop</x-jet-label>
                    </div>
                    <div class="w-10/12">
                        <x-input.text class="py-1 bg-gray-100 border-none" type="text" readonly   id="unitxprop" name="unitxprop" value="{{$campelemento->unitxprop}}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-3/12 p-2 m-2 border border-blue-500 rounded-md shadow-md" style="max-height: 350px;">
            @can('campaign.edit')
                <input type="file" id="file{{ $campelemento->id }}" class="sr-only" wire:model="imagenelemento" />
            @endcan
            @if(file_exists( 'galeria/'.$campaign->id.'/'.$campelemento->imagen ))
                <label for="file{{ $campelemento->id }}" class="cursor-pointer">
                    <img src="{{asset('galeria/'.$campaign->id.'/'.$campelemento->imagen.'?'.time())}}" alt={{$campelemento->imagen}} title={{$campelemento->imagen}}
                    class="w-80"/>
                </label>
            @else
                <label for="file{{ $campelemento->id }}" class="cursor-pointer">
                    <img src="{{asset('galeria/pordefecto.jpg')}}" alt={{$campelemento->imagen}} title={{$campelemento->imagen}}
                    class="w-80"/>
                </label>
            @endif
            @error('imagenelemento') <span class="text-red-500">{{ $message }} </span>@enderror
        </div>
    </div>
    <div class="">
        @can('campaign.edit')
            <x-button.primary wire:click="saveinput"  >Guardar</x-button.primary>
            <span
                        x-data="{ open: false }"
                        x-init="
                            @this.on('notify-saved', () => {
                                if (open === false) setTimeout(() => { open = false }, 2500);
                                open = true;
                            })
                        "
                    x-show.transition.out.duration.1000ms="open"
                    style="display: none;"
                    class="p-2 m-2 text-gray-500 rounded-lg bg-green-50"
                    >Saved!</span>
        @endcan
        <x-jet-button  class="py-2 text-black border-gray-200 bg-gray-50" onclick="location.href = '{{ route('campaign.elementos',$campaign->id) }}'" color="gray" >{{ __('Volver') }}</x-jet-button>

        {{-- <x-button.secondary><a class="" href="{{route('campaign.elementos',$campaign->id)}}" title="Ir la página anterior">Volver</a><x-button.secondary/> --}}
    </div>
</div>
