<div class="h-full p-1 mx-2">
    <div class="">
        @include('errores')
    </div>
    <div class="card">
        <form id="formcampaign" role="form" method="POST" action="{{ route('campaign.update',$campaign->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="text-xl font-bold">
            Datos de la campaña
        </div>
        <div class="mt-2 space-y-4">
            <div class="w-full rounded-md">
                <x-jet-label class="ml-1 text-base" for="campaign_name">Campaña</x-jet-label>
                <x-input.text type="text" class="" id="campaign_name" name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"/>
            </div>
            <div class="w-full rounded-md">
                <x-jet-label class="ml-1 text-base" for="campaign_initdate">Fecha Inicio</x-jet-label>
                <x-input.text type="date" class="" id="campaign_initdate" name="campaign_initdate" value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"/>
            </div>
            <div class="w-full rounded-md">
                <x-jet-label class="ml-1 text-base" for="campaign_enddate">Fecha Fin Prevista</x-jet-label>
                <x-input.text type="date" class="" id="campaign_enddate" name="campaign_enddate" value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"/>
            </div>
            <div class="w-full rounded-md">
                <x-jet-label class="ml-1 text-base" for="campaign_state">Estado</x-jet-label>
                <x-select  selectname="campaign_state" class="w-full py-1 text-lg border-blue-300" id="campaign_state" name="campaign_state" >
                    <option value="{{$campaign->campaign_state}}">{{$campaign->campaign_state}}</option>
                    <option value="Creada">Creada</option>
                    <option value="Iniciada">Iniciada</option>
                    <option value="Finalizada">Finalizada</option>
                    <option value="Cancelada">Cancelada</option>
                </x-select>
            </div>
        </div>
        <div class="my-2">
            @can('elemento.edit')
            <x-jet-button type="submit" class="bg-blue-700 hover:bg-blue-900" >
                {{ __('Actualizar') }}
            </x-jet-button>
            @endcan
            <x-jet-button  class="py-2 text-black border-gray-200 bg-gray-50" onclick="location.href = '{{ route('campaign.index') }}'" color="gray" >{{ __('Volver') }}</x-jet-button>
        </div>
    </form>
</div>

@push('scriptchosen')

<script>

</script>

@endpush
