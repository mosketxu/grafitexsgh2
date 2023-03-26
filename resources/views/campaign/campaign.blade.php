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
                <input type="text" id="campaign_name" name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                    class="flex-1 p-1 pl-2 form-input border border-blue-300 block w-full transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                    {{ $deshabilitado }}/>
            </div>
            <div class="flex  space-x-2">
                <div class="w-full rounded-md">
                    <x-jet-label class="ml-1 text-base" for="campaign_initdate">Fecha Inicio</x-jet-label>
                    <input type="date" id="campaign_initdate" name="campaign_initdate" value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                    class="p-1 pl-2 form-input border border-blue-300 block w-full transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                    {{ $deshabilitado }}/>
                </div>
                <div class="w-full rounded-md">
                    <x-jet-label class="ml-1 text-base" for="campaign_enddate">Fecha Fin Prevista</x-jet-label>
                    <input type="date"  id="campaign_enddate" name="campaign_enddate" value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                    class="p-1 pl-2 form-input border border-blue-300 block w-full transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                    {{ $deshabilitado }}/>
                </div>
            </div>
            <div class="text-blue-900 underline text-base ml-2">Fechas de instalación previstas</div>
            <div class="flex-none space-y-2 text-base md:flex md:justify-between md:space-y-0">
                <div class="w-full rounded-lg flex items-center space-x-2 bg-gray-100 p-2 mx-1">
                    <x-jet-label class="w-2/12 mx-2 text-base" for="montaje1 ">Fecha de </x-jet-label>
                    @if($deshabilitado=='')
                        <x-select  selectname="montaje1" id="montaje1" name="montaje1"
                            class="w-4/12 py-0.5 text-base border-blue-300">
                            <option value="">-Sel.--</option>
                            <option value="M" {{ $campaign->montaje1=='M' ? 'selected' : '' }}>Montaje</option>
                            <option value="D" {{ $campaign->montaje1=='D'  ? 'selected' : '' }}>Desmontaje</option>
                        </x-select>
                    @else
                        <input type="text"  name="montaje1" value="{{$campaign->montaje1}}"
                            class="flex-1 p-1 pl-2 form-input border border-blue-300 block w-6/12 text-base transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                            {{ $deshabilitado }}/>
                    @endif
                    <input type="date" id="fechainstal1" name="fechainstal1" value="{{ old('fechainstal1',$campaign->fechainstal1) }}"
                        class="w-6/12 text-base  p-1 pl-2 form-input border border-blue-300 block transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                        {{ $deshabilitado }}/>
                </div>
                <div class="w-full rounded-lg flex items-center space-x-2 bg-gray-100 p-2 mx-1">
                    <x-jet-label class="w-2/12 mx-2 text-base" for="montaje2 ">Fecha de </x-jet-label>
                    @if($deshabilitado=='')
                        <x-select  selectname="montaje2" id="montaje2" name="montaje2"
                            class="w-4/12 py-0.5  text-base  border-blue-300">
                            <option value="">-Sel.--</option>
                            <option value="M" {{ $campaign->montaje2=='M' ? 'selected' : '' }}>Montaje</option>
                            <option value="D" {{ $campaign->montaje2=='D'  ? 'selected' : '' }}>Desmontaje</option>
                        </x-select>
                    @else
                        <input type="text"  name="montaje2" value="{{$campaign->montaje2}}"
                            class="flex-1 p-1 pl-2 form-input border border-blue-300 block w-6/12 text-base transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                            {{ $deshabilitado }}/>
                    @endif
                    <input type="date" id="fechainstal2" name="fechainstal2" value="{{ old('fechainstal2',$campaign->fechainstal2) }}"
                        class="w-6/12 text-base  p-1 pl-2 form-input border border-blue-300 block transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                        {{ $deshabilitado }}/>
                </div>
                <div class="w-full rounded-lg flex items-center space-x-2 bg-gray-100 p-2 mx-1">
                    <x-jet-label class="w-2/12 mx-2 text-base" for="montaje3 ">Fecha de </x-jet-label>
                    @if($deshabilitado=='')
                        <x-select  selectname="montaje3" id="montaje3" name="montaje3"
                            class="w-4/12 py-0.5  text-base  border-blue-300">
                            <option value="">-Sel.--</option>
                            <option value="M" {{ $campaign->montaje3=='M' ? 'selected' : '' }}>Montaje</option>
                            <option value="D" {{ $campaign->montaje3=='D'  ? 'selected' : '' }}>Desmontaje</option>
                        </x-select>
                    @else
                        <input type="text"  name="montaje3" value="{{$campaign->montaje3}}"
                            class="flex-1 p-1 pl-2 form-input border border-blue-300 block w-6/12 text-base transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                            {{ $deshabilitado }}/>
                    @endif
                    <input type="date" id="fechainstal3" name="fechainstal3" value="{{ old('fechainstal3',$campaign->fechainstal3) }}"
                        class="w-6/12 text-base  p-1 pl-2 form-input border border-blue-300 block transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                        {{ $deshabilitado }}/>
                </div>
            </div>

            <div class="w-full rounded-md">
                <x-jet-label class="ml-1 text-base" for="campaign_state">Estado</x-jet-label>
                @if($deshabilitado=='')
                <x-select  selectname="campaign_state" id="campaign_state" name="campaign_state"
                    class="w-full py-1 text-lg border-blue-300">
                    <option value="{{$campaign->campaign_state}}">{{$campaign->campaign_state}}</option>
                    <option value="Creada">Creada</option>
                    <option value="Iniciada">Iniciada</option>
                    <option value="Finalizada">Finalizada</option>
                    <option value="Cancelada">Cancelada</option>
                </x-select>
                @else
                    <input type="text"  name="estado" value="{{$campaign->campaign_state}}"
                        class="flex-1 p-1 pl-2 form-input border border-blue-300 block w-full transition rounded-lg duration-150 hover:border-blue-300 focus:border-blue-300  active:border-blue-300"
                        {{ $deshabilitado }}/>
                @endif
            </div>
        </div>
        <div class="my-2">
            @can('elemento.edit')
            <x-jet-button type="submit" class="bg-blue-700 hover:bg-blue-900" >
                {{ __('Actualizar') }}
            </x-jet-button>
            @endcan
            <x-jet-button type="button" class="py-2 text-gray-400 border-gray-200 bg-gray-50" onclick="location.href = '{{ route('campaign.index') }}'" color="gray" >{{ __('Volver') }}</x-jet-button>
        </div>
    </form>
</div>

@push('scriptchosen')

<script>

</script>

@endpush
