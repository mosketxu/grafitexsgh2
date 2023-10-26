<x-app-layout>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('producto.prod',['producto'=>$producto,'ruta'=>$ruta],key($producto->id))
            </div>
        </div>
    </div>
</x-app-layout>
