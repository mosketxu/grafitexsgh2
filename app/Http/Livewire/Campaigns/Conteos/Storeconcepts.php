<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Storeconcepts extends Component
{
    public $campaign;
    public $visible=false;
    public $titulo='Por Store Concepts';

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render()
    {
        $conceptos=CampaignElemento::tienda($this->campaign->id)
        ->select('storeconcept', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('storeconcept')
        ->paginate(10);

        return view('livewire.campaigns.conteos.storeconcepts',compact('conceptos'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}