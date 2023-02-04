<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Medidas extends Component
{
    public $campaign;
    public $visible=false;
    public $titulo='Por Medidas';

    public function render()
    {
        $medidas=CampaignElemento::tienda($this->campaign->id)
        ->select('medida', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('medida')
        ->paginate(10);

        return view('livewire.campaigns.conteos.medidas',compact('medidas'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
