<div class="flex-none lg:flex">
    <form wire:submit.prevent="save" class="w-full">
        <div class="flex w-full space-x-1 text-gray-500">
            <div class="w-2/12 ">
                <x-jet-label class="pl-2 text-xs" for="username">Usuario</x-jet-label>
                <input type="text" id="username" wire:model.lazy="username" class="w-full py-1 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-blue-400 focus:outline-none" disabled/>
            </div>
            <div class="w-2/12 ">
                <x-jet-label class="pl-2 text-xs" for="prod">Estado</x-jet-label>
                <select  name="estadopeticion_id" class="w-full py-1 text-xs text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-blue-400 focus:outline-none" id="estadopeticion_id" wire:model.lazy="estadopeticion_id" >
                    <option value="">--Sel--</option>
                    @foreach ($estados as $estado )
                    <option value="{{ $estado->id }}">{{ $estado->estadopeticion }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="estadopeticion_id" class="mt-2" />
            </div>
            <div class="w-6/12">
                <x-jet-label class="pl-2 text-xs" for="observaciones">{{ __('Observaciones') }}</x-jet-label>
                <textarea name="" wire:model.lazy="observaciones" id=""  rows="2"
                class="w-full py-1 text-xs border-blue-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                <x-jet-input-error for="observaciones" class="mt-2" />
            </div>
            <div class="w-1/12 mt-4 text-right">
                    <button type="submit"><x-icon.save-a class="w-8"></x-icon.save-a></button>
                </div>
            </div>
    </form>
</div>
