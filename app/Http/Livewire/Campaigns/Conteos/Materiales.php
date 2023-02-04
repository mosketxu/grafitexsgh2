<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Materiales extends Component
{
    public $campaign;
    public $visible=false;
    public $titulo='Por Materiales';

    public function mount($campaign){
        $this->campaign=$campaign;
    }


    public function render(){

        $materiales=  CampaignElemento::tienda($this->campaign->id)
        ->select('material', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('material')
        ->paginate(10);

        return view('livewire.campaigns.conteos.materiales',compact('materiales'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
