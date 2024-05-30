<div class="">
    <div class="p-1 mx-2">
        <div class="flex flex-row">
            <div class="flex items-center w-6/12">
                <div class="w-6/12">
                    <h1 class="text-2xl font-semibold text-gray-900">Hay peticiones pendientes</h1>
                    <p>No puedes nuevo pedido hasta no haber actualizado el estado de la ultima petición</p>
                    <div class="flex space-x-2">
                        <form method="GET" action="{{ route('peticion.editar',[$peticion]) }}">
                            <x-button.primary type="submit">Ir a peticion pendiente de finalizar</x-button.primary>
                        </form>
                        <form method="GET" action="{{route('peticion.index') }}">
                            <x-button.secondary type="submit">Volver</x-button.secondary>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
