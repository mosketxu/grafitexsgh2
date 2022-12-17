@can('store.create')
    <nav x-data="{ open: false }" class="rounded-md ">
        <div class="px-2 mx-auto sm:px-2 lg:px-2">
            <div class="flex justify-between ">
                <div class="flex text-xs">
                    <div class="hidden space-x-2 sm:-my-px sm:m-2 sm:flex">
                        @livewire('stores.modalstores')
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endcan
