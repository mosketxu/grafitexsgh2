<nav x-data="{ open: false }" class="rounded-md ">
    <div class="w-full px-2 mx-auto sm:px-2 lg:px-2">
        <div class="w-full flex justify-between ">
            <div class="w-full flex text-xs">
                <div class="flex w-8/12 space-x-1 text-xs mr-2">
                    <form method="GET" action="{{ route('campaign.index') }}" class="w-full">
                        <div class="flex w-full mr-2">
                            <div class="w-10/12">
                                <x-input.text  class="w-full" type="search" id="search" name="search" value="{{ $busqueda }}" placeholder="Búsqueda de campaña"/>
                            </div>
                            <div class="flex w-2/12 ">
                                <div class="">
                                    <button type="submit" class="bg-white border-none shadow-none " ><x-icon.filter class="text-blue-500 transform hover:text-blue-700 hover:scale-125"/></button>
                                </div>
                                <div class="">
                                    <a class="text-blue-700 underline" href='{{route(Route::currentRouteName())}}'  title="Borrar Filtro"><x-icon.filter-slash/></a>
                                </div>
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
