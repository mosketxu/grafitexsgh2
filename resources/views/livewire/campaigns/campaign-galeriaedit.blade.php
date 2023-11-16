<div class="py-2 border rounded-md shadow-md">
    @can('campaign.edit')
    <input type="file" id="file{{ $campelemento->id }}" class="sr-only" wire:model="imagenelemento" />
    @endcan
    @if(file_exists( 'storage/galeria/'.$campaign->id.'/'.$campelemento->imagen ))
    <label for="file{{ $campelemento->id }}" class="cursor-pointer">
        <img src="{{asset('storage/galeria/'.$campaign->id.'/'.$campelemento->imagen.'?'.time())}}" alt={{$campelemento->imagen}} title={{$campelemento->imagen}}
        class="h-56 mx-auto"/>
    </label>
    @else
    <label for="file{{ $campelemento->id }}" class="cursor-pointer">
        <img src="{{asset('storage/galeria/pordefecto.jpg')}}" alt={{$campelemento->imagen}} title={{$campelemento->imagen}}
        class="h-56 mx-auto"/>
    </label>
    @endif
    @error('imagenelemento') <span class="text-red-500">{{ $message }} </span>@enderror
</div>

