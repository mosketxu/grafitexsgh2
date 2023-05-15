<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
    </div>
    <div class="m-2 space-y-4 text-gray-500">
        <div class="flex w-full">
            <div class="w-full">
                @livewire('tarifasfamilia.tarifas-familia',['tipo'=>'1','titulo'=>'Tarifas picking','color'=>'bg-blue-500','campo'=>'zona','buscar'=>'0',key($campaign_id->id)])
            </div>
        </div>
    </div>
        <!-- Modal -->
    {{-- <div class="modal fade" id="tarifaFamiliaCreateModal" tabindex="-1" role="dialog" aria-labelledby="tarifaFamiliaCreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tarifaFamiliaCreateModalLabel">Nueva Familia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('tarifafamilia.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group col">
                            <label for="material">Material</label>
                            <input type="text" class="form-control form-control-sm" id="material" name="material"
                                value="{{ old('material') }}" />
                        </div>
                        <div class="form-group col">
                            <label for="medida">Medida</label>
                            <input type="text" class="form-control form-control-sm" id="medida" name="medida"
                                value="{{ old('medida') }}" />
                        </div>
                        <div class="form-group col">
                            <label for="tarifa_id">Familia</label>
                            <select name="tarifa_id" id="tarifa_id" class="form-control form-control-sm">
                                @foreach($tarifafamilias as $tarifa)
                                <option value="{{$tarifa->id}}">{{$tarifa->familia}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" name="Guardar"
                            onclick="form.submit()">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
</div>

@push('scriptchosen')


<script>


</script>

@endpush
