<x-app-layout>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('marca.marca',['marca'=>$marca,'ruta'=>$ruta],key($marca->id))
            </div>
        </div>
    </div>
</x-app-layout>
