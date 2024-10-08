<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class Medidas extends Component
{
    use WithPagination;

    public $campaign;
    public $visible=false;
    public $titulo='Por Medidas';

    public function render()
    {
        $medidas=CampaignElemento::tienda($this->campaign->id)
        ->select('medida', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('medida')
        ->get();

        return view('livewire.campaigns.conteos.medidas',compact('medidas'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
