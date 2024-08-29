<div class="flex ">
        @can('campaign.edit')
    <div onclick="location.href = '{{ route('campaign.elemento.editelemento',[$campaign->id,$campelemento->id]) }}'"
        class="flex items-center w-full py-0 mt-2 text-sm tracking-tighter text-gray-500 border-b cursor-pointer border-1 hover:bg-gray-200">
    @else
        <div class="flex items-center w-full py-0 mt-2 text-sm tracking-tighter text-gray-500 border-b border-1 hover:bg-gray-200">
    @endcan
        <input type="hidden" name="elementoId" value="{{$campelemento->id}}"/>
        <div class="w-2/12 pl-2">
            <div class="">{{$campelemento->store_id}} </div>
            <div class="">{{$campelemento->name}}</div>
        </div>
        <div class="w-1/12 pl-2">
            <div class="">{{$campelemento->country}} </div>
            <div class="">{{$campelemento->area}} </div>
            <div class="">{{$campelemento->idioma}}</div>
        </div>
        <div class="w-1/12 pl-2">
            <div class="">{{$campelemento->segmento}}</div>
            <div class="">{{$campelemento->storeconcept}}</div>
        </div>
        <div class="w-1/12 pl-2">
            <div class="">{{$campelemento->ubicacion}} </div>
            <div class="">{{$campelemento->store_cluster}}</div>
        </div>
        <div class="w-2/12 pl-2">{{$campelemento->mobiliario}}</div>
        <div class="w-1/12 pl-2">{{$campelemento->propxelemento}}</div>
        <div class="w-1/12 pl-2">{{$campelemento->carteleria}}</div>
        <div class="w-1/12 pl-2">
            <div class="">{{$campelemento->medida}} </div>
            <div class="">{{$campelemento->material}}</div>
        </div>
        <div class="w-1/12 pl-2">{{$campelemento->unitxprop}}</div>
        <div width="w-1/12 pl-2" >
            <div class="p-1 border rounded-md shadow-md">
                @can('campaign.edit')
                    <input type="file" id="file{{ $campelemento->id }}" class="sr-only" wire:model="imagenelemento" />
                @endcan
                @if(file_exists( 'storage/galeria/'.$campaign->id.'/thumbnails/thumb-'.$campelemento->imagen ))
                <label for="file{{ $campelemento->id }}" class="cursor-pointer">
                    <img src="{{asset('storage/galeria/'.$campaign->id.'/thumbnails/thumb-'.$campelemento->imagen.'?'.time())}}" alt={{$campelemento->imagen}} title={{$campelemento->imagen}}
                        class="mx-auto h-11"/>
                </label>
                @else
                <label for="file{{ $campelemento->id }}" class="cursor-pointer">
                    <img src="{{asset('storage/galeria/pordefecto.jpg')}}" alt={{$campelemento->imagen}} title={{$campelemento->imagen}}
                    class="mx-auto h-11"/>
                </label>
                @endif
                @error('imagenelemento') <span class="text-red-500">{{ $message }} </span>@enderror
            </div>
        </div>
    </div>
</div>
