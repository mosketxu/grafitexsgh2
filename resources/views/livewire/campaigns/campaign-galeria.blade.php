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
