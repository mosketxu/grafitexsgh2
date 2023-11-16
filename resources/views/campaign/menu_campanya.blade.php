<nav x-data="{ open: false }" class="rounded-md ">
    <div class="">
        <div class="hidden md:flex md:w-full md:space-x-4 lg:space-x-8">
            @include('campaign.acciones')
        </div>
        <div class="text-center md:hidden">
            @livewire('campaigns.modal-acciones',['campaign'=>$campaign])
        </div>
    </div>
</nav>
