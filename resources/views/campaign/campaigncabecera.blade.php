<div class="text-gray-500 border border-blue-300 rounded shadow-md">
    <div class="flex w-full p-1 bg-gray-100 rounded-md">
        <div class="w-6/12 mx-1">
            <x-jet-label for="campaign_name">Campaña</x-jet-label>
            <input type="text" class="w-full py-0.5 bg-gray-100 rounded-md" id="campaign_name"
                name="campaign_name" value="{{ $campaign->campaign_name }}"
                disabled />
        </div>
        <div class="w-2/12 mx-1">
            <x-jet-label for="campaign_initdate">Fecha Inicio</x-jet-label>
            <input type="date" class="w-full py-0.5 bg-gray-100 rounded-md" id="campaign_initdate"
                name="campaign_initdate"
                value="{{ $campaign->campaign_initdate }}"
                disabled />
        </div>
        <div class="w-2/12 mx-1">
            <x-jet-label for="campaign_enddate">Fecha Finalización</x-jet-label>
            <input type="date" class="w-full py-0.5 bg-gray-100 rounded-md" id="campaign_enddate"
                name="campaign_enddate"
                value="{{ $campaign->campaign_enddate }}"
                disabled />
        </div>
        <div class="w-2/12 mx-1">
            <x-jet-label for="fechaentregatienda">F.Tienda</x-jet-label>
            <input type="date" class="w-full py-0.5 bg-gray-100 rounded-md" id="fechaentregatienda"
                name="fechaentregatienda"
                value="{{ $campaign->fechaentregatienda }}"
                disabled />
        </div>
    </div>
</div>
