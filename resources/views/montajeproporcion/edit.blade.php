<x-app-layout>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('montaje-proporcion.montaje-proporcion',['montajeproporcion'=>$montajeproporcion,'ruta'=>$ruta],key($montajeproporcion->id))
            </div>
        </div>
    </div>
</x-app-layout>
