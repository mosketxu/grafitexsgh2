<nav x-data="{ open: false }" class="rounded-md ">
    <div class="flex w-full px-2 mx-auto ">
        <div class="flex justify-between w-full ">
            @can('campaign.index')
                <a  href="{{route('campaign.index') }}" title="Campañas"><x-icon.campground  class="pt-1 mx-4 text-orange-400 w-7"/></a>
            @endcan
            @can('campaign.edit')
            <x-icon.edit-a  href="{{route('campaign.edit',$campaign) }}" title="Filtros" class="w-6 pt-1 mx-4 text-blue-500 "/>
            <a  href="{{route('campaign.filtrar',$campaign->id) }}" title="Filtros"><x-icon.filter class="w-6 pt-1 mx-4 text-black "/></a>
            @endcan
            @can('campaign.index')
            <x-icon.cubes-a  href="{{route('campaign.elementos',$campaign) }}"  title="Elementos" class="pt-1 mx-4 text-green-500 w-7"/>
            <x-icon.images-a  href="{{route('campaign.galeria',$campaign->id) }}" title="Galeria" class="pt-1 mx-4 text-purple-700 w-7"/>
            <x-icon.tags-a  href="{{route('campaign.etiquetas.pdf',$campaign->id) }}" title="Etiquetas PDF" class="pt-1 mx-4 text-pink-700 w-7"/>
            <x-icon.code-a  href="{{route('campaign.etiquetas.index',$campaign->id) }}" target="_blank" title="Etiquetas HTML" class="pt-1 mx-4 text-indigo-500 w-7"/>
            <x-icon.location-dot-a  href="{{route('campaign.addresses',$campaign->id) }}" title="Direcciones" class="w-5 pt-1 mx-4 text-teal-600 "/>
            @endcan
            @can('presupuestos.index')
            <x-icon.money-a  href="{{route('campaign.presupuesto',$campaign->id) }}" title="Presupuesto" class="w-8 pt-1 text-pink-500"/>
            @endcan
            @can('campaign.index')
            <x-icon.chart-column-a  href="{{route('campaign.conteo',$campaign->id) }}" title="Estadísticas" class="pt-1 mx-4 text-orange-500 w-7"/>
            @endcan
        </div>
    </div>
</nav>
