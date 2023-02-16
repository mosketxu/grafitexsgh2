<nav x-data="{ open: false }" class="rounded-md ">
    <div class="w-full px-2 mx-auto sm:px-2 lg:px-2">
        <div class="flex justify-between w-full ">
            <div class="flex w-full text-xs">
                <div class="flex w-8/12 mr-2 space-x-1 text-xs">
                    <form method="GET" action="{{ route('campaign.index') }}" class="w-full">
                        <div class="flex w-full mr-2">
                            <div class="w-full">
                                <x-input.text  type="search" id="search" name="search" value="{{ $busqueda }}"
                                class="w-full placeholder:italic placeholder:text-slate-400 border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Búsqueda de campaña..."/>
                            </div>
                        </div>
                    </form>
                </div>
                @can('campaign.create')
                <div class="hidden w-4/12 space-x-2 sm:-my-px sm:m-2 sm:flex">
                    @livewire('campaigns.modal-campanya')
                </div>
                @endcan
            </div>
        </div>
    </div>
</nav>
