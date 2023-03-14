<div>
    <x-icon.delete-a class="w-6" wire:click.prevent="delete({{ $store->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()"/>
</div>
