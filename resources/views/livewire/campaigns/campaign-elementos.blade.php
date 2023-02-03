<tr class="flex w-full">
    <input type="hidden" name="elementoId" value="{{$campelemento->id}}"/>
    <td class="hidden">{{$campelemento->id}}</td>
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
    <td width="150px">
        <div class="py-2 border rounded-md shadow-md">
            @can('campaign.edit')
            <input type="file" id="file{{ $campelemento->id }}" class="sr-only" wire:model="imagenelemento" />
            @endcan
            @if(file_exists( 'galeria/'.$campaign->id.'/'.$campelemento->imagen ))
            <label for="file{{ $campelemento->id }}" class="cursor-pointer">
                <img src="{{asset('galeria/'.$campaign->id.'/'.$campelemento->imagen.'?'.time())}}" alt={{$campelemento->imagen}} title={{$campelemento->imagen}}
                class=""/>
            </label>
            @else
            <label for="file{{ $campelemento->id }}" class="cursor-pointer">
                <img src="{{asset('galeria/pordefecto.jpg')}}" alt={{$campelemento->imagen}} title={{$campelemento->imagen}}
                class=""/>
            </label>
            @endif
            @error('imagenelemento') <span class="text-red-500">{{ $message }} </span>@enderror
        </div>
    </td>
    <td width="w-1/12">
        @can('campaign.edit')
        <div class="mt-1">
            <a href="{{ route('campaign.elemento.editelemento',[$campaign->id,$campelemento->id]) }}" title="Edit"><x-icon.edit/></a>
        </div>
        @endcan
    </td>
</tr>
