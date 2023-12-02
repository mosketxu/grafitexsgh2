<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Materialmedidas extends Component
{
    use WithPagination;

    public $campaign;
    public $visible=false;
    public $titulo='Por Material Medidas';

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render()
    {
        $materialmedidas=CampaignElemento::tienda($this->campaign->id)
        ->join('tarifas','tarifas.id','campaign_elementos.familia')
        ->select('tarifas.familia as tfam','campaign_elementos.familia','matmed','material','medida', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('tarifas.familia','matmed','material','medida')
        ->get();

        return view('livewire.campaigns.conteos.materialmedidas', compact('materialmedidas'));
    }
    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
