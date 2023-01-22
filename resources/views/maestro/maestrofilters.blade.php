<form method="GET" action="{{route('maestro.index') }}">
    <div class="grid grid-cols-12 space-y-1 gap2 ">
        <div class="w-full col-span-11 space-y-1 ">
            <div class="flex space-x-1 text-xs">
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="sto" name="sto" type="text"  value='{{$sto}}' placeholder="Filtro Store"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="nam" name="nam" type="text"  value='{{$nam}}' placeholder="Filtro Name"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="coun" name="coun" type="text"  value='{{$coun}}' placeholder="Filtro country"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="are" name="are" type="text"  value='{{$are}}' placeholder="Filtro Area"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="seg" name="seg" type="text"  value='{{$seg}}' placeholder="Filtro Segmento"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="cha" name="cha" type="text"  value='{{$cha}}' placeholder="Filtro Channel"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="clu" name="clu" type="text"  value='{{$clu}}' placeholder="Filtro Cluster"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="conce" name="conce" type="text"  value='{{$conce}}' placeholder="Filtro Concept"/></div>
            </div>
            <div class="flex space-x-1 text-xs">
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="fur" name="fur" type="text"  value='{{$fur}}' placeholder="Filtro Furniture"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="ubi" name="ubi" type="text"  value='{{$ubi}}' placeholder="Filtro Ubicación"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="mob" name="mob" type="text"  value='{{$mob}}'  placeholder="Filtro Mobiliario"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="propx" name="propx" type="text"  value='{{$propx}}'  placeholder="Filtro Prop x Elem"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="cart" name="cart" type="text"  value='{{$cart}}'  placeholder="Filtro Carteleria"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="med" name="med" type="text"  value='{{$med}}'  placeholder="Filtro Medida"/></div>
                <div class="w-full"><input class="w-full py-1 text-xs rounded-md" id="mat" name="mat" type="text"  value='{{$mat}}'  placeholder="Filtro Material"/></div>
            </div>
        </div>
            <div class="col-span-1 ml-8">
                <div class="w-full py-0 "><button type="submit" class="bg-white border-none shadow-none " ><x-icon.filter class="text-blue-500 transform hover:text-blue-700 hover:scale-125"/></button></div>
                <div width="w-full py-0 "><x-icon.filter-slash-a  onclick="borrarFiltros()"></x-icon.filter-slash-a></div>
            </div>
        </div>
    </div>
</form>
