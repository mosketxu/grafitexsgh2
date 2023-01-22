<form method="GET" action="{{ route('storeelementos.elementos',$store) }}">
    <div class="flex w-full space-x-1 text-xs">
        <div class="w-full">
            <select class="" id="ubi" name="ubi[]" data-placeholder="Ubicación" multiple>
                @foreach ($ubicaciones as $ubicacion )
                    <option value="{{$ubicacion->ubicacion}}" {{ empty($ubi) ? "" : (in_array($ubicacion->ubicacion, $ubi) ? "selected" : "")}}>{{$ubicacion->ubicacion}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full">
            <select class="" id="mobi" name="mobi[]" data-placeholder="Mobiliario" multiple>
                @foreach ($mobiliarios as $mobiliario )
                    <option value="{{$mobiliario->mobiliario}}" {{ empty($mobi) ? "" : (in_array($mobiliario->mobiliario, $mobi) ? "selected" : "")}}>{{$mobiliario->mobiliario}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full">
            <select class="" id="prop" name="prop[]" data-placeholder="PropxElemento" multiple>
                @foreach ($props as $propxelem )
                    <option value="{{$propxelem->propxelemento}}" {{ empty($ubi) ? "" : (in_array($propxelem->propxelemento, $ubi) ? "selected" : "")}}>{{$propxelem->propxelemento}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full">
            <select class="" id="car" name="car[]" data-placeholder="Carteleria" multiple>
                @foreach ($cartelerias as $carteleria )
                    <option value="{{$carteleria->carteleria}}" {{ empty($car) ? "" : (in_array($carteleria->carteleria, $car) ? "selected" : "")}}>{{$carteleria->carteleria}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full">
            <select class="" id="med" name="med[]" data-placeholder="Medida" multiple>
                @foreach ($medidas as $medida )
                    <option value="{{$medida->medida}}" {{ empty($med) ? "" : (in_array($medida->medida, $med) ? "selected" : "")}}>{{$medida->medida}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full">
            <select class="" id="mat" name="mat[]" data-placeholder="Material" multiple>
                @foreach ($materiales as $material )
                    <option value="{{$material->material}}" {{ empty($mat) ? "" : (in_array($material->material, $mat) ? "selected" : "")}}>{{$material->material}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex w-full ">
            <div class="">
                <button type="submit" class="bg-white border-none shadow-none " ><x-icon.filter class="text-blue-500 transform hover:text-blue-700 hover:scale-125"/></button>
            </div>
            <div class="">
                </div><a class="text-blue-700 underline" href='{{route(Route::currentRouteName(),$store)}}'  title="Borrar Filtro"><x-icon.filter-slash></x-icon.filter-slash></a>
            </div>
        </div>
    </div>
</form>
