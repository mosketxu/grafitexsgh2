<nav x-data="{ open: false }" class="rounded-md ">
    <div class="px-2 mx-auto sm:px-2 lg:px-2">
        <div class="flex justify-between ">
            <div class="flex text-xs">
                <form method="GET" action="{{ route('elemento.index') }}">
                    <div class="flex w-full space-x-1 text-xs">
                        <div class="w-full">
                            <x-input.text  type="search" id="search" name="search" placeholder="Búsqueda de campaña"/>
                        </div>
                        <div class="flex w-full ">
                            <div class="">
                                <button type="submit" class="bg-white border-none shadow-none " ><x-icon.filter class="text-blue-500 transform hover:text-blue-700 hover:scale-125" /></button>
                            </div>
                            <div class="">
                                </div><a class="text-blue-700 underline" href='{{route(Route::currentRouteName())}}'  title="Borrar Filtro"><x-icon.filter-slash></x-icon.filter-slash></a>
                            </div>
                        </div>
                    </div>
                </form>
                @can('campaign.create')
                <div class="hidden space-x-2 sm:-my-px sm:m-2 sm:flex">
                    @livewire('campaigns.modal-campanya')
                    </div>
                @endcan
            </div>
        </div>
    </div>
</nav>
