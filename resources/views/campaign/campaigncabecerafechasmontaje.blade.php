<div class="w-full text-gray-500 border border-blue-300 rounded shadow-md">
    <div class="flex w-full p-1 rounded-md">
        <div class="w-4/12 text-sm ">
            <div class="text-center"><label for="fechainstal1">F.Montaje 1</label></div>
            <div class="flex">
                    <input type="date" class="w-9/12 px-0 text-sm py-0.5 bg-gray-100 rounded-md" id="fechainstal1"
                    name="fechainstal1"
                    value="{{ old('fechainstal1',$campaign->fechainstal1) }}"
                    disabled />
                    <input type="text" class="w-3/12 px-0 text-sm  py-0.5 bg-gray-100 rounded-md" id="montaje1"
                    name="montaje1"
                    value="{{ old('montaje1',$campaign->montaje1) }}"
                    disabled />
            </div>
        </div>
        <div class="w-4/12 text-sm ">
            <div class="text-center"><label for="fechainstal2">F.Montaje 2</label></div>
            <div class="flex">

                <input type="date" class="w-9/12 text-sm px-0 py-0.5 bg-gray-100 rounded-md" id="fechainstal2"
                name="fechainstal2"
                value="{{ old('fechainstal2',$campaign->fechainstal2) }}"
                disabled />
                <input type="text" class="w-3/12 text-sm px-0 py-0.5 bg-gray-100 rounded-md" id="montaje2"
                name="montaje2"
                value="{{ old('montaje2',$campaign->montaje2) }}"
                disabled />
            </div>
        </div>
        <div class="w-4/12 text-sm ">
            <div class="text-center"><label for="fechainstal1">F.Montaje 3</label></div>
            <div class="flex">
                <input type="date" class="w-9/12 text-sm px-0 py-0.5 bg-gray-100 rounded-md" id="fechainstal3"
                name="fechainstal3"
                value="{{ old('fechainstal3',$campaign->fechainstal3) }}"
                disabled />
                <input type="text" class="w-3/12 text-sm px-0 py-0.5 bg-gray-100 rounded-md" id="montaje3"
                name="montaje3"
                value="{{ old('montaje3',$campaign->montaje3) }}"
                disabled />
            </div>
        </div>
    </div>
</div>
