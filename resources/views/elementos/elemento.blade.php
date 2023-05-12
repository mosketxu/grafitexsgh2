<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-0 space-y-2">
            <div class="">
                @include('errores')
            </div>
            <div class="">
                {{-- @include('filtros si toca') --}}
            </div>
            {{-- datos del elemento --}}
        {{-- main content  --}}

            <div class="flex-col space-y-1 text-gray-500 border border-blue-300 rounded shadow-md">
                <form role="form" method="POST" action="{{ route('elemento.update',$elemento) }}">
                @csrf
                @method('PUT')
                    <div class="m-2 space-y-2 text-sm">
                        <div class="flex space-x-2">
                            <div class="w-full">
                                <x-jet-label for="area">Ubicación</x-jet-label>
                                <x-select  selectname="ubicacion_id" class="w-full py-1 border-blue-300" id="ubicacion_id" name="ubicacion_id" >
                                    <option value="">Selecciona</option>
                                    @foreach($ubicaciones as $ubicacion )
                                    <option value="{{$ubicacion->id}}" {{old('ubicacion_id',$elemento->ubicacion_id)==$ubicacion->id ? 'selected' : ''}}>{{$ubicacion->ubicacion}}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="w-full">
                                <x-jet-label for="area">Mobiliario</x-jet-label>
                                <x-select  selectname="mobiliario_id" class="w-full py-1 border-blue-300" id="mobiliario_id" name="mobiliario_id" >
                                    <option value="">Selecciona</option>
                                    @foreach($mobiliarios as $mobiliario )
                                    <option value="{{$mobiliario->id}}" {{old('mobiliario_id',$elemento->mobiliario_id)==$mobiliario->id ? 'selected' : ''}}>{{$mobiliario->mobiliario}}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>
                        <div class="flex space-x-2 ">
                            <div class="w-full">
                                <x-jet-label for="area">Prop x Elemento</x-jet-label>
                                <x-select  selectname="propxelemento_id" class="w-full py-1 border-blue-300" id="propxelemento_id" name="propxelemento_id" >
                                    <option value="">Selecciona</option>
                                    @foreach($props as $propxelemento )
                                    <option value="{{$propxelemento->id}}" {{old('propxelemento_id',$elemento->propxelemento_id)==$propxelemento->id ? 'selected' : ''}}>{{$propxelemento->propxelemento}}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="w-full">
                                <x-jet-label for="area">Carteleria</x-jet-label>
                                <x-select  selectname="carteleria_id" class="w-full py-1 border-blue-300" id="carteleria_id" name="carteleria_id" >
                                    <option value="">Selecciona</option>
                                    @foreach($cartelerias as $carteleria )
                                    <option value="{{$carteleria->id}}" {{old('carteleria_id',$elemento->carteleria_id)==$carteleria->id ? 'selected' : ''}}>{{$carteleria->carteleria}}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>
                        <div class="flex space-x-2 ">
                            <div class="w-full">
                                <x-jet-label for="area">Medida</x-jet-label>
                                <x-select  selectname="medida_id" class="w-full py-1 border-blue-300" id="medida_id" name="medida_id" >
                                    <option value="">Selecciona</option>
                                    @foreach($medidas as $medida )
                                    <option value="{{$medida->id}}" {{old('medida_id',$elemento->medida_id)==$medida->id ? 'selected' : ''}}>{{$medida->medida}}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="w-full">
                                <x-jet-label for="area">Material</x-jet-label>
                                <x-select  selectname="material_id" class="w-full py-1 border-blue-300" id="material_id" name="material_id" >
                                    <option value="">Selecciona</option>
                                    @foreach($materiales as $material )
                                    <option value="{{$material->id}}" {{old('material_id',$elemento->material_id)==$material->id ? 'selected' : ''}}>{{$material->material}}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>
                        <div class="flex space-x-2 ">
                            <div class="w-full">
                                <x-jet-label for="unitxprop">Unit X Prop</x-jet-label>
                                <x-input.text  class="w-full py-0.5 " id="unitxprop" name="unitxprop" value="{{old('unitxprop',$elemento->unitxprop)}}"/>
                                <input type="hidden"  name="familia_id" value="1"/>
                            </div>
                            <div class="w-full">
                                <x-jet-label for="area">Familia</x-jet-label>
                                <x-select  selectname="familias_id" class="w-full py-1 border-blue-300" id="material_id" name="material_id" >
                                    <option value="">Selecciona</option>
                                    @foreach($tarifas as $familia )
                                    <option value="{{$familia->id}}" {{old('familia_id',$elemento->familia_id)==$familia->id ? 'selected' : ''}}>{{$familia->familia}}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-full">
                                <x-jet-label for="observaciones">Observaciones</x-jet-label>
                                <x-input.text  class="w-full " id="observaciones" name="observaciones" value="{{old( 'observaciones',$elemento->observaciones)}}"/>
                            </div>
                        </div>
                        {{-- botones --}}
                        <div class="">
                            @can('elemento.edit')
                            <x-jet-button type="submit" class="bg-blue-700 hover:bg-blue-900" >
                                {{ __('Actualizar') }}
                            </x-jet-button>
                            @endcan
                            <x-button.secondary  class="py-2 text-black border-gray-200 bg-gray-50" onclick="location.href = '{{ route('elemento.index' ) }}'" color="gray" >{{ __('Volver') }}</x-button.secondary>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

@push('scriptchosen')

<script>
</script>

@endpush
