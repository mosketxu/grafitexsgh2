<form action="{{ route('plan.update',$campaign) }}"  method="post" class="w-full my-2 md:w-4/12">
    @csrf
    @method('PUT')
    <div class="text-sm space-y-0.5">
        <div class="flex items-center w-full space-x-2 bg-gray-100 rounded-lg ">
            <button type="submit" class="items-center w-full text-xs font-semibold tracking-widest text-white uppercase transition bg-blue-800 border border-transparent rounded-md hover:bg-blue-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                {{ __('Actualizar fechas instalación') }}
            </button>
        </div>
        <div class="flex items-center w-full space-x-2 bg-gray-100 rounded-lg ">
            <x-jet-label class="w-2/12 mx-2 text-sm" for="montaje1 ">Fecha de </x-jet-label>
                <x-select  selectname="montaje1" id="montaje1" name="montaje1"
                    class="w-4/12 py-0.5 text-sm border-blue-300">
                    <option value="">-Sel.--</option>
                    <option value="M" {{ $campaign->montaje1=='M' ? 'selected' : '' }}>Montaje</option>
                    <option value="D" {{ $campaign->montaje1=='D'  ? 'selected' : '' }}>Desmontaje</option>
                </x-select>
            <input type="date" id="fechainstal1" name="fechainstal1" value="{{ old('fechainstal1',$campaign->fechainstal1) }}"
                class="w-6/12 text-sm  py-0.5 form-input border border-blue-300 block transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"/>
        </div>
        <div class="flex items-center w-full space-x-2 bg-gray-100 rounded-lg ">
            <x-jet-label class="w-2/12 mx-2 text-sm" for="montaje2 ">Fecha de </x-jet-label>
                <x-select  selectname="montaje2" id="montaje2" name="montaje2"
                    class="w-4/12 py-0.5  text-sm  border-blue-300">
                    <option value="">-Sel.--</option>
                    <option value="M" {{ $campaign->montaje2=='M' ? 'selected' : '' }}>Montaje</option>
                    <option value="D" {{ $campaign->montaje2=='D'  ? 'selected' : '' }}>Desmontaje</option>
                </x-select>
            <input type="date" id="fechainstal2" name="fechainstal2" value="{{ old('fechainstal2',$campaign->fechainstal2) }}"
                class="w-6/12 text-sm  py-0.5 form-input border border-blue-300 block transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"/>
        </div>
        <div class="flex items-center w-full space-x-2 bg-gray-100 rounded-lg ">
            <x-jet-label class="w-2/12 mx-2 text-sm" for="montaje3 ">Fecha de </x-jet-label>
                <x-select  selectname="montaje3" id="montaje3" name="montaje3"
                    class="w-4/12 py-0.5  text-sm  border-blue-300">
                    <option value="">-Sel.--</option>
                    <option value="M" {{ $campaign->montaje3=='M' ? 'selected' : '' }}>Montaje</option>
                    <option value="D" {{ $campaign->montaje3=='D'  ? 'selected' : '' }}>Desmontaje</option>
                </x-select>
            <input type="date" id="fechainstal3" name="fechainstal3" value="{{ old('fechainstal3',$campaign->fechainstal3) }}"
                class="w-6/12 text-sm  py-0.5 form-input border border-blue-300 block transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"/>
        </div>
    </div>
</form>
