<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-3/12">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Elementos de la Campaña
                </h2>
            </div>
            <div class="flex flex-row-reverse w-7/12 ">
                @can('campaign.index')
                @include('campaign.menu_campanya')
                @endcan

                {{-- <div class="">
                    <div class="hidden md:flex md:w-full md:justify-between">
                        {{-- @include('campaign.acciones') --}}
                    {{-- </div> --}}
                    {{-- <div class="mt-6 text-center md:hidden">
                        @livewire('campaigns.modal-acciones',['campaign'=>$campaign])
                    </div> --}}
                {{-- </div> --}}


            </div>
            <div class="flex flex-row-reverse w-2/12 ">
                <div class="w-full">
                    <form method="GET" action="{{route('campaign.elementos',$campaign) }}">
                        <x-input.text id="busca" name="busca"  type="text" class="w-full ml-2" name="search" value='{{$busqueda}}' placeholder="Search for..."/>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('campaign.elementos.elementos')
            </div>
        </div>
        <div class="pb-2 mx-2 my-2">
            <x-button.secondary  class="uppercase bg-white hover:bg-gray-200" onclick="location.href = '{{ route('campaign.index') }}'" color="gray" >{{ __('Volver') }}</x-button.secondary>
        </div>
    </div>
</x-app-layout>
