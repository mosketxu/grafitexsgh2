<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-0 space-y-2">
            <div class="">
                @include('errores')
            </div>
            <div class="">
                {{-- @include('filtros si toca') --}}
            </div>

    {{-- - /.content-header --}}
    {{-- main content  --}}
    <div class="flex-col space-y-1 text-gray-500 border border-blue-300 rounded shadow-md">
        <div class="flex">
            <div class="">
                <label for="campaign_name">Campaña</label>
                <input type="text" class="form-control form-control-sm" id="campaign_name"
                    name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                    disabled />
            </div>
            <div class="">
                <label for="campaign_initdate">Fecha Inicio</label>
                <input type="date" class="form-control form-control-sm" id="campaign_initdate"
                    name="campaign_initdate"
                    value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}" disabled />
            </div>
            <div class="">
                <label for="campaign_enddate">Fecha Finalización</label>
                <input type="date" class="form-control form-control-sm" id="campaign_enddate"
                    name="campaign_enddate"
                    value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}" disabled />
                </div>
            </div>
        </div>
        <div class="flex justify-between space-x-3">
            @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign])
            @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign])
        </div>
    </div>
</div>

@push('scriptchosen')

@endpush
