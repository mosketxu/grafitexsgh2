{{-- <div class=""> --}}
    @can('campaign.edit')
    <x-icon.filter-a href="{{route('campaign.filtrar', $campaign) }}" title="Filtrar" class="mr-1 text-black transform w-7 hover:text-black hover:scale-125"/></a>
    @endcan
    @can('campaign.index')
    <x-icon.cubes-a href="{{route('campaign.elementos', $campaign->id ) }}" title="Elementos" class="mr-1 text-green-500 transform w-7 hover:text-green-800 hover:scale-125"/>
    <x-icon.images-a href="{{route('campaign.galeria', $campaign->id ) }}" title="Galeria" class="mr-1 text-purple-700 transform w-7 hover:text-purple-900 hover:scale-125"/>
    <x-icon.tags-a href="{{route('campaign.etiquetas.pdf', $campaign->id ) }}" title="Etiquetas PDF" class="mr-1 text-pink-700 transform w-7 hover:text-pink-900 hover:scale-125"/>
    <x-icon.code-a href="{{route('campaign.etiquetas.index',$campaign->id) }}" target="_blank" title="Etiquetas HTML" class="mr-1 text-indigo-500 transform w-7 hover:text-indigo-900 hover:scale-125"/></a>
    <x-icon.location-dot-a href="{{route('campaign.addresses',$campaign->id) }}" title="Direcciones"  class="mr-1 text-teal-600 transform w-5 hover:text-teal-900 hover:scale-125"/>
    @endcan
    @can('presupuestos.index')
    <x-icon.money-a href="{{route('campaign.presupuesto', $campaign->id ) }}" title="Presupuesto" class="mr-1  text-pink-500 transform w-8 hover:text-pink-700 hover:scale-125"/>
    @endcan
    @can('campaign.index')
    <x-icon.chart-column-a href="{{route('campaign.conteo', $campaign->id ) }}" title="Estadísticas" class="mr-1 text-orange-500 transform w-6 hover:text-orange-700 hover:scale-125"/></a>
    @endcan
    @can('plan.index')
    <x-icon.calendar-days-a href="{{route('plan.index', $campaign->id ) }}" title="Planificacion" class="mr-1 text-cyan-500 transform w-6 hover:text-cyan-700 hover:scale-125"/></a>
    @endcan
    @can('campaign.delete')
    <form  action="{{route('campaign.destroy',$campaign->id)}}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" name="_tokenCampaign" value="{{ csrf_token()}}" id="tokenCampaign">
        <button type="submit" class="enlace"><x-icon.trash class=" text-red-500 transform w-6 hover:text-red-700 hover:scale-125"/></a></button>
    </form>
    @endcan
{{-- </div> --}}
