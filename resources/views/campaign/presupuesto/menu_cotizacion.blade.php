<nav x-data="{ open: false }" class="rounded-md ">
    <div class="flex w-full px-2 mx-auto ">
        <div class="flex justify-between w-full ">
            <div class="col-auto mr-auto">
                @can('presupuestos.edit')
                <x-icon.arrows-rotate-a class="text-blue-500" href="{{route('campaign.presupuesto.refresh',[$campaignpresupuesto->campaign_id,$campaignpresupuesto->id])}}" title="Refrescar tarifas"/>
                @endcan
                @can('presupuestos.index')
                <x-icon.pdf-a href="{{route('campaign.presupuesto.pdfPresupuesto',$campaignpresupuesto->id)}}" title="Imprimir Presupuesto"/>
                @endcan
             </div>
        </div>
    </div>
</nav>
