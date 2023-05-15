<form wire:submit.prevent="save">
    <div class="flex items-center w-full text-xs text-gray-500 border-t-0 border-y space-x-2 hover:bg-gray-100" wire:loading.class.delay="opacity-50">
        <div class="w-1/12 "><x-input.text class="w-full text-xs pl-2" type="text" value="{{ $tarifa->id }} - {{ $tarifa->tarifa_id }}" readonly disabled/></div>
        <div class="w-4/12 "><x-input.text class="w-full text-xs pl-2" type="text" wire:model='material'/></div>
        <div class="w-3/12  "><x-input.text class="w-full text-xs pl-2" type="text" wire:model='medida'/></div>
        <div class="w-3/12 ">
            <x-selectcolor selectname="tarifaid" color="blue" wire:model='tarifaid' class="w-full text-xm pl-2 ">
                {{-- <option value="{{$familia->tarifa_id}}" selected>{{$sinidentificar->familia}}</option> --}}
                @foreach($tarifas as $tar)
                    <option value="{{$tar->id}}">{{$tar->familia}}</option>
                @endforeach
            </x-selectcolor>
        </div>
        <div class="w-1/12 mx-auto text-center">
            <button type="submit"><x-icon.save-a class="text-blue"></x-icon.save-a></button>
            <x-icon.delete-a wire:click.prevent="delete({{ $tarifa->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="w-6 pl-1"  title="Eliminar tarifa"/>
       </div>
    </div>
</form>


