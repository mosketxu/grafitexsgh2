<div>
    <x-icon.delete-a wire:click.prevent="delete({{ $elemento }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="pl-1"/>
</div>

