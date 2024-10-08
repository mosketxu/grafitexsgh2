<form method="GET" action="{{ route('storeelementos.elementos',$store) }}">
    <div class="flex w-full space-x-1 text-xs">
        <div class="w-full">
            <select class="" id="escap" name="escap[]" data-placeholder="Escaparate" multiple>
                @foreach ($escaparates as $escaparate )
                    <option value="{{$escaparate->escaparate}}" {{ empty($ubi) ? "" : (in_array($escaparate->escaparate, $ubi) ? "selected" : "")}}>{{$escaparate->escaparate}}</option>
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
