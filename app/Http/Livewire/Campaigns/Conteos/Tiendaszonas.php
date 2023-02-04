<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignTienda;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Tiendaszonas extends Component
{
    public $campaign;
    public $visible=false;
    public $titulo='Por Tiendas Zonas';

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render()
    {
        $tiendaszonas= CampaignTienda::storeElemento($this->campaign->id)
        ->select('campaign_elementos.country as country','campaign_elementos.area as area', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('country','area')
        ->paginate(10);


        return view('livewire.campaigns.conteos.tiendaszonas',compact('tiendaszonas'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
