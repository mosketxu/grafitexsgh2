<nav x-data="{ open: false }" class="rounded-md ">
    <div class="px-2 mx-auto sm:px-2 lg:px-2">
        <div class="flex justify-between ">
            <div class="flex text-xs">
                <x-button.button  onclick="location.href = '{{ route('escaparate.create') }}'" color="blue">Nuevo</x-button.button>
            </div>
        </div>
    </div>
</nav>
