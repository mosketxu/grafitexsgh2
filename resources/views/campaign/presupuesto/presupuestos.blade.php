<div class="">
    <div class="p-1 mx-2">
        <div class="flex w-full">
            <div class="w-11/12">
                @include('campaign.campaigncabecera')
            </div>
            <div class="w-1/12 text-center">
                <div class="text-center">
                    <label for="xls">Hay {{$presupuestos->count()}} presupuestos.</label>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        @include('errores')
    </div>
    <div class="">
        <div class="w-full px-4">
            <span class="text-blue-500"></span>
            <span class="text-yellow-500"></span>
            <span class="text-green-500"></span>
            <span class="text-red-500"></span>
            <span class="text-gray-100"></span>
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black">
                    <tr class="flex w-full">
                        <th class="w-1/12 pl-2">#</th>
                        <th class="w-2/12">Referencia</th>
                        <th class="w-1/12">Versión</th>
                        <th class="w-1/12">Fecha </th>
                        <th class="w-1/12">Att.</th>
                        <th class="w-1/12">Total</th>
                        <th class="w-3/12">Observaciones</th>
                        <th class="w-1/12 pr-6 text-center ">Estado</th>
                        <th class="w-1/12 "></th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 70vh;">
                    @foreach($presupuestos as $presupuesto)
                    <tr class="flex items-center w-full">
                        <td class="w-1/12 pl-2">{{$presupuesto->id}}</td>
                        <td class="w-2/12">{{$presupuesto->referencia}}</td>
                        <td class="w-1/12">{{$presupuesto->version}}</td>
                        <td class="w-1/12">{{$presupuesto->fechapre}}</td>
                        <td class="w-1/12">{{$presupuesto->atencion}}</td>
                        <td class="w-1/12">{{$presupuesto->total}}</td>
                        <td class="w-3/12 pl-2">{{$presupuesto->observaciones}}</td>
                        <td class="w-1/12 mx-auto "><x-icon.circle class="mt-2  mx-auto {{ $presupuesto->status[0] }}" title="{{ $presupuesto->status[1] }}"/></td>
                        <td class="w-1/12">
                            <form action="{{route('campaign.presupuesto.delete', $presupuesto->id )}}" method="post">
                            @csrf
                            @method('DELETE')
                            @can('presupuestos.edit')
                                <x-icon.edit-a href="{{route('campaign.presupuesto.edit', $presupuesto->id )}}" title="Editar" class="mr-2 text-blue-600 w-7"/>
                            @endcan
                            @can('presupuestos.index')
                                <x-icon.calc-a href="{{route('campaign.presupuesto.cotizacion', $presupuesto->id )}}" title="Cotizacion" class="text-orange-500 w-7 hover:text-orange-700"/>
                            @endcan
                            @can('presupuestos.delete')
                                <button onclick="return confirm('{{ __('¿Estás seguro?') }}')"><x-icon.delete class="text-red-500 w-9"/></button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@push('scriptchosen')

<script>

</script>

@endpush
