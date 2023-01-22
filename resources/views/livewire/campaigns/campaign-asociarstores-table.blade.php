<div>
    <table class="table-auto" >
        <thead>
            <tr class="text-white bg-{{ $color }}"">
                <th class="" width="10%"><x-input.checkbox wire:model="selectPage" /></th>
                <th class="" width="80%" style="cursor: pointer" wire:click="$toggle('visible')">{{ $titulo }}</th>
                <th class="" width="10%" style="cursor: pointer" wire:click="$toggle('visible')"><x-icon.plus/></th>
            </tr>
        </thead>
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">            @if($visible=='1')
                @forelse ($disponibles as $disponible)
                <tr>
                    <td><x-input.checkbox wire:model="selected" value="{{ $disponible->id }}" /></td>
                    <td>{{ $disponible->id }} - {{ $disponible->name }}</td>
                    <td><x-icon.arrow-right-a wire:click="asocia({{ $disponible->id }})"/></td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="items-center justify-center"><x-icon.inbox class="w-5 h-5 text-gray-300"/><span class="py-5 text-base font-medium text-gray-500">No se han encontrado registros...</span></td>
                </tr>
                @endforelse
            @endif
        </tbody>
    </table>
</div>
