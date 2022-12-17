<div>
    <x-icon.delete-a wire:click.prevent="delete({{ $store->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="pl-1"/>
</div>
