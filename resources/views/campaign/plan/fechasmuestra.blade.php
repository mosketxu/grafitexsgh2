<div class="w-full my-2 md:w-4/12">
    <div class="items-center text-sm md:space-y-3">
        <div class="w-full my-2 text-xs font-semibold tracking-widest text-center text-white uppercase bg-blue-800 border border-transparent rounded-md ">
            {{ __('Fechas de instalación') }}
        </div>
        <div class="flex items-center w-full space-x-2 bg-gray-100 rounded-lg ">
            <x-jet-label class="w-2/12 mx-2 text-sm" >Fecha de </x-jet-label>
            <input type="text" value="{{ $campaign->monta1 }}"
                class="w-6/12 text-sm  py-0.5 form-input border border-blue-300 block bg-gray-100 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                disabled/>
            <input type="date" name="fechainstal1" value="{{ $campaign->fechainstal1 }}"
                class="w-6/12 text-sm  py-0.5 form-input border border-blue-300 block bg-gray-100 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                disabled/>
        </div>
        <div class="flex items-center w-full space-x-2 bg-gray-100 rounded-lg ">
            <x-jet-label class="w-2/12 mx-2 text-sm" >Fecha de </x-jet-label>
            <input type="text" value="{{ $campaign->monta2 }}"
                class="w-6/12 text-sm  py-0.5 form-input border border-blue-300 block bg-gray-100 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                disabled/>
            <input type="date" name="fechainstal2" value="{{ $campaign->fechainstal2 }}"
                class="w-6/12 text-sm  py-0.5 form-input border border-blue-300 block bg-gray-100 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                disabled/>
        </div>
        <div class="flex items-center w-full space-x-2 bg-gray-100 rounded-lg ">
            <x-jet-label class="w-2/12 mx-2 text-sm" >Fecha de </x-jet-label>
            <input type="text" value="{{ $campaign->monta3 }}"
                class="w-6/12 text-sm  py-0.5 form-input border border-blue-300 block bg-gray-100 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                disabled/>
            <input type="date" name="fechainstal3" value="{{ $campaign->fechainstal3 }}"
                class="w-6/12 text-sm  py-0.5 form-input border border-blue-300 block bg-gray-100 transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                disabled/>
        </div>
    </div>
</div>
