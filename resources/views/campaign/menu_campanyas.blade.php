<nav x-data="{ open: false }" class="rounded-md ">
    <div class="w-full px-2 mx-auto sm:px-2 lg:px-2">
        <div class="flex justify-between w-full ">
            <div class="flex w-full items-center">
                <form method="GET" action="{{ route('campaign.index') }}" class="flex">
                <div class="w-full mr-2">
                    <x-select  selectname="filtrocampaign" id="filtrocampaign"
                        class="w-full border-blue-300" >
                        <option value="">--Filtro estado--</option>
                        <option value="0" {{ $filtrocampaign=="0" ?'selected' : '' }}>Creada</option>
                        <option value="1" {{ $filtrocampaign=="1" ?'selected' : '' }}>Iniciada</option>
                        <option value="2" {{ $filtrocampaign=="2" ?'selected' : '' }}>Finalizada</option>
                        <option value="3" {{ $filtrocampaign=="3" ?'selected' : '' }}>Cancelada</option>
                    </x-select>
                </div>
                <div class="w-full mr-2">
                    <x-input.text  type="search" id="search" name="search" value="{{ $busqueda }}"
                        class="w-full placeholder:italic placeholder:text-slate-400 border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Búsqueda de campaña..."/>
                </div>
                </form>
                @can('campaign.create')
                    <div class="w-full/12">
                    @livewire('campaigns.modal-campanya')
                    </div>
                @endcan
            </div>
        </div>
    </div>
</nav>
