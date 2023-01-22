<form id="formfiltro" method="GET" action="{{route('store.addresses') }}">
    <div class="flex">
        <div class="w-full">
            <select id="select-code" name="sto[]" multiple placeholder="Selecciona el codido de la tienda..." autocomplete="off" multiple
            class="block w-full rounded-sm cursor-pointer focus:outline-none">
                @foreach ($stores as $store )
                    <option value="{{$store->id}}" {{ empty($sto) ? "" : (in_array($store->id, $sto) ? "selected" : "")}}>{{$store->id}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full">
            <select id="select-name" name="nam[]" multiple placeholder="Selecciona el nombre de la tienda..." autocomplete="off" multiple
            class="block w-full rounded-sm cursor-pointer focus:outline-none">
                    @foreach ($stores as $store )
                    <option value="{{$store->name}}" {{ empty($nam) ? "" : (in_array($store->name, $nam) ? "selected" : "")}}>{{$store->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full">
            <div class="flex ml-2 space-x-2">
                <div class="py-0 "><button type="submit" class="bg-white border-none shadow-none " ><x-icon.filter class="text-blue-500 transform hover:text-blue-700 hover:scale-125"/></button></div>
            </div>
        </div>
    </div>
</form>

