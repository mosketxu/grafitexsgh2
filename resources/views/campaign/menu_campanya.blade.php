<nav x-data="{ open: false }" class="rounded-md ">
    <div class="flex w-full px-2 mx-auto ">
        <div class="flex justify-between w-full mr-4 space-x-5 ">
            @can('campaign.index')
                <a  href="{{route('campaign.index') }}" title="Campañas"><x-icon.campground  class="pt-1 text-orange-400 w-7"/></a>
            @endcan
            @can('campaign.edit')
            <a  href="{{route('campaign.edit',$campaign) }}" title="Filtros"><x-icon.edit class="w-6 pt-1 text-blue-500"/></a>
            <a  href="{{route('campaign.filtrar',$campaign->id) }}" title="Filtros"><x-icon.filter class="w-6 pt-1 text-black"/></a>
            @endcan
            @can('campaign.index')
            <a  href="{{route('campaign.elementos',$campaign) }}"  title="Elementos"><x-icon.cubes  class="pt-1 text-green-500 w-7"/></a>
            <a  href="{{route('campaign.galeria',$campaign->id) }}" title="Galeria"><x-icon.images  class="pt-1 text-blue-500 w-7"/></a>
            <a  href="{{route('campaign.etiquetas.pdf',$campaign->id) }}" title="Etiquetas"><x-icon.tags class="pt-1 text-blue-500 w-7"/></a>
            <a  href="{{route('campaign.etiquetas.index',$campaign->id) }}" title="Etiquetas HTML"><x-icon.code class="pt-1 text-blue-500 w-7"/></a>
            <a  href="{{route('campaign.addresses',$campaign->id) }}" title="Direcciones"><x-icon.location-dot class="w-5 pt-1 text-blue-500"/></a>
            <a  href="{{route('campaign.conteo',$campaign->id) }}" title="Estadísticas"><x-icon.chart-column  class="pt-1 text-blue-500 w-7"/></a>
            @endcan
            @can('presupuestos.index')
                <a  href="{{route('campaign.presupuesto',$campaign->id) }}" title="Presupuesto"><x-icon.money class="w-8 pt-1 text-blue-500"/></a>
            @endcan
        </div>
    </div>
</nav>
