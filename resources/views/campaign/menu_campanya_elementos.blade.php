<nav x-data="{ open: false }" class="rounded-md ">
    <div class="w-full flex px-2 mx-auto ">
        <div class="w-full flex justify-between space-x-5 mr-4 ">
            @can('campaign.edit')
                <a  href="{{route('campaign.filtrar',$campaign->id) }}" title="Filtros"><x-icon.edit class="w-6 pt-1 text-blue-500"/></a>
            @endcan
            @can('campaign.index')
                <a  href="{{route('campaign.index') }}" title="Campañas"><x-icon.campground  class="w-7 pt-1 text-blue-500"/></a>
                <a  href="{{route('campaign.elementos',$campaign) }}"  title="Elementos"><x-icon.cubes  class="w-7 pt-1 text-blue-500"/></a>
                <a  href="{{route('campaign.conteo',$campaign->id) }}" title="Estadísticas"><x-icon.chart-column  class="w-7 pt-1 text-blue-500"/></a>
                <a  href="{{route('campaign.galeria',$campaign->id) }}" title="Galeria"><x-icon.images  class="w-7 pt-1 text-blue-500"/></a>
                <a  href="{{route('campaign.addresses',$campaign->id) }}" title="Direcciones"><x-icon.location-dot class="w-5 pt-1 text-blue-500"/></a>
                <a  href="{{route('campaign.etiquetas.pdf',$campaign->id) }}" title="Etiquetas"><x-icon.tags class="w-7 pt-1 text-blue-500"/></a>
                <a  href="{{route('campaign.etiquetas.index',$campaign->id) }}" title="Etiquetas HTML"><x-icon.code class="w-7 pt-1 text-blue-500"/></a>
            @endcan
            @can('presupuestos.index')
                <a  href="{{route('campaign.presupuesto',$campaign->id) }}" title="Presupuesto"><x-icon.money class="w-8 pt-1 text-blue-500"/></a>
            @endcan
        </div>
        <div class="w-full">
            <form method="GET" action="{{route('campaign.elementos',$campaign) }}">
                <x-input.text id="busca" name="busca"  type="text" class="w-full" name="search" value='{{$busqueda}}' placeholder="Search for..."/>
            </form>
        </div>
    </div>
</nav>
