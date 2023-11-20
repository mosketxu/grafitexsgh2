<x-app-layout>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('peticion-detalle.peti-detalle',['peticion'=>$peticion,'peticiondetalle'=>$peticiondetalle,'ruta'=>$ruta],key($peticiondetalle->id))
            </div>
        </div>
    </div>
</x-app-layout>
