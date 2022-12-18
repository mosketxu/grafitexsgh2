<div>
    <div class="flex space-x-3">
        <button wire:click="cambiamodal()"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
            Nuevo
        </button>
    </div>
    <x-modal.datos wire:model="muestramodal" >
        <x-slot name="title">
            {{ __('Nuevo Elemento') }}
        </x-slot>
        <x-slot name="content">
            <form id="formularioelemento" role="form" method="post" action="{{ route('elemento.store') }}" enctype="multipart/form-data" >
            @csrf
            <div class="space-y-2 text-sm">
                <div class="flex space-x-1 ">
                    <div class="w-4/12">
                        <x-jet-label for="area">Ubicación</x-jet-label>
                        <x-select  selectname="ubicacion_id" class="w-full py-1 border-blue-300" id="ubicacion_id" name="ubicacion_id" >
                            <option value="">Selecciona</option>
                            @foreach($ubicaciones as $ubicacion )
                            <option value="{{$ubicacion->id}}" {{old('ubicacion_id')==$ubicacion->id ? 'selected' : ''}}>{{$ubicacion->ubicacion}}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="w-4/12">
                        <x-jet-label for="area">Mobiliario</x-jet-label>
                        <x-select  selectname="mobiliario_id" class="w-full py-1 border-blue-300" id="mobiliario_id" name="mobiliario_id" >
                            <option value="">Selecciona</option>
                            @foreach($mobiliarios as $mobiliario )
                            <option value="{{$mobiliario->id}}" {{old('mobiliario_id')==$mobiliario->id ? 'selected' : ''}}>{{$mobiliario->mobiliario}}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="w-4/12">
                        <x-jet-label for="area">Prop x Elemento</x-jet-label>
                        <x-select  selectname="propxelemento_id" class="w-full py-1 border-blue-300" id="propxelemento_id" name="propxelemento_id" >
                            <option value="">Selecciona</option>
                            @foreach($props as $propxelemento )
                            <option value="{{$propxelemento->id}}" {{old('propxelemento_id')==$propxelemento->id ? 'selected' : ''}}>{{$propxelemento->propxelemento}}</option>
                            @endforeach
                        </x-select>
                    </div>
                </div>
                <div class="flex space-x-1 ">
                    <div class="w-3/12">
                        <x-jet-label for="area">Carteleria</x-jet-label>
                        <x-select  selectname="carteleria_id" class="w-full py-1 border-blue-300" id="carteleria_id" name="carteleria_id" >
                            <option value="">Selecciona</option>
                            @foreach($cartelerias as $carteleria )
                            <option value="{{$carteleria->id}}" {{old('carteleria_id')==$carteleria->id ? 'selected' : ''}}>{{$carteleria->carteleria}}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="w-3/12">
                        <x-jet-label for="area">Medida</x-jet-label>
                        <x-select  selectname="medida_id" class="w-full py-1 border-blue-300" id="medida_id" name="medida_id" >
                            <option value="">Selecciona</option>
                            @foreach($medidas as $medida )
                            <option value="{{$medida->id}}" {{old('medida_id')==$medida->id ? 'selected' : ''}}>{{$medida->medida}}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="w-3/12">
                        <x-jet-label for="area">Material</x-jet-label>
                        <x-select  selectname="material_id" class="w-full py-1 border-blue-300" id="material_id" name="material_id" >
                            <option value="">Selecciona</option>
                            @foreach($materiales as $material )
                            <option value="{{$material->id}}" {{old('material_id')==$material->id ? 'selected' : ''}}>{{$material->material}}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="w-3/12">
                        <x-jet-label for="unitxprop">Unit X Prop</x-jet-label>
                        <x-input.text  class="w-full py-0.5 " id="unitxprop" name="unitxprop" value="{{old('unitxprop')}}"/>
                        <input type="hidden"  name="familia_id" value="1"/>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-full">
                        <x-jet-label for="observaciones">Observaciones</x-jet-label>
                        <x-input.text  class="w-full " id="observaciones" name="observaciones" value="{{old('observaciones')}}"/>
                    </div>
                </div>
                <div class="mt-5 ">
                    <x-jet-secondary-button wire:click="cambiamodal()">
                        {{ __('Cancelar') }}
                    </x-jet-secondary-button>
                    @can('store.create')
                    <x-jet-button type="submit" class="bg-blue-700 hover:bg-blue-900" >
                        {{ __('Guardar') }}
                    </x-jet-button>
                    @endcan
                </div>
            </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <div class="text-left">
                @include('errores')
            </div>
        </x-slot>
    </x-modal.datos>
</div>
