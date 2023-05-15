<nav x-data="{ open: false }" class="rounded-md ">
    <div class="w-full px-2 mx-auto sm:px-2 lg:px-2">
        @can('tarifa.create')
            <div class="hidden space-x-2 sm:-my-px sm:m-2 sm:flex">
                @livewire('familias.modal-familia-nueva')
            </div>
        @endcan
    </div>
</nav>

