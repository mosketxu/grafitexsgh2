<div>
    <x-icon.delete-a wire:click.prevent="delete({{ $elemento }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="w-6 mr-2"/>
</div>
