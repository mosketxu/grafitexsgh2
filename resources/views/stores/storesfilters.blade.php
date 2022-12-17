<form method="GET" action="{{route('store.index') }}">
    <div class="grid grid-cols-12 space-y-1 gap2 ">
        <div class="w-full col-span-11 space-y-1 ">
            <div class="flex space-x-1 text-xs">
                <div class="w-full">
                    <select class="" id="lux" name="lux[]" data-placeholder="Luxotica" multiple>
                        <option value="Oliver Peoples" {{ empty($lux) ? "" : (in_array("Oliver Peoples", $lux) ? "selected" : "")}}>Oliver Peoples</option>
                        <option value="Ray-Ban Store" {{ empty($lux) ? "" : (in_array("Ray-Ban Store", $lux) ? "selected" : "")}}>Ray-Ban Store</option>
                        <option value="Sunglass Hut" {{ empty($lux) ? "" : (in_array("Sunglass Hut", $lux) ? "selected" : "")}}>Sunglass Hut</option>
                    </select>
                </div>
                <div class="w-full">
                    <select class="" id="sto" name="sto[]" data-placeholder="stores" multiple>
                        @foreach ($stores as $store )
                            <option value="{{$store->id}}" {{ empty($sto) ? "" : (in_array($store->id, $sto) ? "selected" : "")}}>{{$store->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <select class="form-control form-control-sm select2" id="nam" name="nam[]" data-placeholder="name" multiple>
                        @foreach ($stores as $store )
                            <option value="{{$store->name}}" {{ empty($nam) ? "" : (in_array($store->name, $nam) ? "selected" : "")}}>{{$store->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <select class="form-control form-control-sm select2" id="coun" name="coun[]" data-placeholder="country" multiple>
                        <option value="ES" {{ empty($coun) ? "" : (in_array("ES", $coun) ? "selected" : "")}}>ES</option>
                        <option value="PT" {{ empty($coun) ? "" : (in_array("PT", $coun) ? "selected" : "")}}>PT</option>
                    </select>
                </div>
                <div class="w-full">
                    <select class="form-control form-control-sm select2" id="are" name="are[]" data-placeholder="area" multiple>
                        @foreach ($areas as $area )
                        <option value="{{$area->area}}" {{ empty($are) ? "" : (in_array($area->area, $are) ? "selected" : "")}}>{{$area->area}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex space-x-1 text-xs">
                <div class="w-full">
                    <select class="form-control form-control-sm select2" id="segmen" name="segmen[]" data-placeholder="segmento" multiple>
                        @foreach ($segmentos as $segmento )
                            <option value="{{$segmento->segmento}}" {{ empty($segmen) ? "" : (in_array($segmento->segmento, $segmen) ? "selected" : "")}}>{{$segmento->segmento}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <select class="form-control form-control-sm select2" id="cha" name="cha[]" data-placeholder="channel" multiple>
                        <option value="Airport" {{ empty($cha) ? "" : (in_array("Airport", $cha) ? "selected" : "")}}>Airport</option>
                        <option value="Dpt.Store" {{ empty($cha) ? "" : (in_array("Dpt.Store", $cha) ? "selected" : "")}}>Dpt.Store</option>
                        <option value="Mall" {{ empty($cha) ? "" : (in_array("Mall", $cha) ? "selected" : "")}}>Mall</option>
                        <option value="Outlet" {{ empty($cha) ? "" : (in_array("Outlet", $cha) ? "selected" : "")}}>Outlet</option>
                        <option value="Street" {{ empty($cha) ? "" : (in_array("Street", $cha) ? "selected" : "")}}>Street</option>
                    </select>
                </div>
                <div class="w-full">
                    <select class="form-control form-control-sm select2" id="clu" name="clu[]" data-placeholder="cluster" multiple>
                        <option value="Basic">Basic</option>
                        <option value="ECI">ECI</option>
                        <option value="INLINE">INLINE</option>
                        <option value="OPEN AIR">OPEN AIR</option>
                    </select>
                </div>
                <div class="w-full">
                    <select class="form-control form-control-sm select2" id="conce" name="conce[]" data-placeholder="concepto" multiple>
                        @foreach ($conceptos as $concepto )
                            <option value="{{$concepto->storeconcept}}" {{ empty($conce) ? "" : (in_array($concepto->storeconcept, $conce) ? "selected" : "")}}>{{$concepto->storeconcept}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <select class="form-control form-control-sm select2" id="fur" name="fur[]" data-placeholder="furniture_type" multiple>
                        @foreach($furnitures as $furniture )
                        <option value="{{$furniture->furniture_type}}" {{ empty($fur) ? "" : (in_array($furniture->furniture_type, $fur) ? "selected" : "")}}>{{$furniture->furniture_type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
            <div class="col-span-1 ml-8">
                <div class="w-full py-0 "><button type="submit" class="bg-white border-none shadow-none " ><x-icon.filter /></button></div>
                <div width="w-full py-0 "><x-icon.filter-slash-a  onclick="borrarFiltros()"></x-icon.filter-slash-a></div>
            </div>
        </div>
    </div>
</form>

{{-- <tr>

        </th>
        <td width="100px">
            <div class="text-center">
                <button type="submit" name="submit" class=" enlace" value="filtrar"><i class="fas fa-search fa-2x text-primary"></i></button>
                <a href="#!" class="btn-borrarfiltro " title="Borrar Filtros" onclick="borrarFiltros('formfiltro')"><i class="ml-1 far fa-times-circle text-danger fa-2x"></i></a>
                &nbsp;&nbsp;
                <button type="submit" name="submit" class=" enlace" value="excel"><i class="mx-1 far fa fa-file-excel text-success fa-2x"></i></button>
            </div>
        </td>
    </form>
</tr> --}}
