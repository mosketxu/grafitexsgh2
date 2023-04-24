<tr class="flex w-full">
    <input type="hidden" name="elementoId" value="{{$campelemento->id}}"/>
    <td class="w-16">{{$campelemento->id}}</td>
    <td class="w-16">{{$campelemento->store_id}}</td>
    <td class="w-1/12">{{$campelemento->name}}</td>
    <td class="w-1/12">{{$campelemento->country}}</td>
    <td class="w-1/12">{{$campelemento->area}}</td>
    <td class="w-1/12">{{$campelemento->idioma}}</td>
    <td class="w-1/12">{{$campelemento->segmento}}</td>
    <td class="w-1/12">{{$campelemento->storeconcept}}</td>
    <td class="w-1/12">{{$campelemento->ubicacion}}</td>
    <td class="w-1/12">{{$campelemento->mobiliario}}</td>
    <td class="w-1/12 text-center">{{$campelemento->propxelemento}}</td>
    <td class="w-1/12 text-center">{{$campelemento->carteleria}}</td>
    <td class="w-1/12">{{$campelemento->medida}}</td>
    <td class="w-1/12 text-center">{{$campelemento->material}}</td>
    <td class="w-1/12 text-center">{{$campelemento->unitxprop}}</td>
    <td width="100px" >
        <div class="py-2 border rounded-md shadow-md">
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
                <img src="{{asset('storage/pordefecto.jpg')}}" alt={{$campelemento->imagen}} title={{$campelemento->imagen}}
                class="mx-auto h-11"/>
            </label>
            @endif
            @error('imagenelemento') <span class="text-red-500">{{ $message }} </span>@enderror
        </div>
    </td>
    <td class="w-16 ml-2">
            @can('campaign.edit')
                <a href="{{ route('campaign.elemento.editelemento',[$campaign->id,$campelemento->id]) }}" title="Edit"><x-icon.edit class="mt-1 text-blue-500"/></a>
            @endcan
    </td>
</tr>
