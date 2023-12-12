@can('store.create')
    <nav x-data="{ open: false }" class="rounded-md ">
        <div class="px-2 mx-auto sm:px-2 lg:px-2">
            <div class="flex justify-between ">
                <div class="flex text-xs">
                    <div class="hidden space-x-2 sm:-my-px sm:m-2 sm:flex">
                        <div class="col-auto mr-auto">
                            <x-button.primary onclick="location.href = '{{route('storeescaparates.edit',$store->id)}}'" >Añadir Escaparate</x-button.primary>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endcan
