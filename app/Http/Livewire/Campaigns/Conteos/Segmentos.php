<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class Segmentos extends Component
{
    use WithPagination;

    public $campaign;
    public $visible=false;
    public $titulo='Por Segmentos';

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render()
    {
        $segmentos= CampaignElemento::tienda($this->campaign->id)
        ->select('segmento', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('segmento')
        ->paginate(10);

        return view('livewire.campaigns.conteos.segmentos',compact('segmentos'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
