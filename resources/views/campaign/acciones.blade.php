    @if(!request()->routeIs('campaign.index'))
    @can('campaign.index')
        {{-- <a  href="{{route('campaign.index') }}" title="Campañas"><x-icon.campground  class="pt-1 text-orange-500 w-7"/></a> --}}
    <div class="w-5"><x-icon.campground-a href="{{route('campaign.index') }}" class="text-orange-500 w-5" title="Campañas"/></div>
    @endcan
    @endif
    @can('campaign.edit')
    <div class="w-5">
        <x-icon.filter-a href="{{route('campaign.filtrar', $campaign) }}" title="Filtrar" class="mr-1 text-black transform w-5 hover:text-black hover:scale-125"/></a>
    </div>
    @endcan
    @can('campaign.index')
    <div class="w-5">
        <x-icon.cubes-a href="{{route('campaign.elementos', $campaign->id ) }}" title="Elementos" class="mr-1 text-green-500 transform w-7 hover:text-green-800 hover:scale-125"/>
    </div>
    <div class="w-5">
        <x-icon.images-a href="{{route('campaign.galeria', $campaign->id ) }}" title="Galeria" class="mr-1 text-purple-700 transform w-7 hover:text-purple-900 hover:scale-125"/>
    </div>
    @endcan
    @can('campaign.create')
    <div class="w-5">
        <x-icon.tags-a href="{{route('campaign.etiquetas.pdf', $campaign->id ) }}" title="Etiquetas PDF" class="mr-1 text-pink-700 transform w-7 hover:text-pink-900 hover:scale-125"/>
    </div>
    <div class="w-5">
        <x-icon.code-a href="{{route('campaign.etiquetas.index',$campaign->id) }}" target="_blank" title="Etiquetas HTML" class="mr-1 text-indigo-500 transform w-7 hover:text-indigo-900 hover:scale-125"/></a>
        </div>
    @endcan
    @can('campaign.index')
    <div class="w-5">
        <x-icon.location-dot-a href="{{route('campaign.addresses',$campaign->id) }}" title="Direcciones"  class="w-5 mr-1 text-teal-600 transform hover:text-teal-900 hover:scale-125"/>
    </div>
    @endcan
    @can('presupuestos.index')
    <div class="w-5">
        <x-icon.money-a href="{{route('campaign.presupuesto', $campaign->id ) }}" title="Presupuesto" class="w-8 mr-1 text-pink-500 transform hover:text-pink-700 hover:scale-125"/>
    </div>
    @endcan
    @can('campaign.index')
    <div class="w-5">
        <x-icon.chart-column-a href="{{route('campaign.conteo', $campaign->id ) }}" title="Estadísticas" class="w-6 mr-1 text-orange-500 transform hover:text-orange-700 hover:scale-125"/></a>
    </div>
    @endcan
    @can('plan.index')
    <div class="w-5">
        <x-icon.calendar-days-a href="{{route('plan.index', $campaign->id ) }}" title="Planificacion" class="w-6 mr-1 transform text-cyan-500 hover:text-cyan-700 hover:scale-125"/></a>
    </div>
    @endcan
    @if(!request()->routeIs('campaign.index'))
    @can('campaign.delete')
    <div class="w-5">
        <form  action="{{route('campaign.destroy',$campaign->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="_tokenCampaign" value="{{ csrf_token()}}" id="tokenCampaign">
            <button type="submit" class="enlace"><x-icon.trash class="w-6 text-red-500 transform  hover:text-red-700 hover:scale-125"/></a></button>
        </form>
    </div>
    @endcan
    @endif
