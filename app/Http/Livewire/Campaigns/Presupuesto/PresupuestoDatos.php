<?php

namespace App\Http\Livewire\Campaigns\Presupuesto;

use App\Models\CampaignPresupuestoPickingtransporte;
use App\Models\VCampaignPromedio;
use Livewire\Component;

class PresupuestoDatos extends Component{

    public $campaign;
    public $presupuesto;
    public $visible=false;
    public $titulo='Datos Presupuesto';

    public function mount($campaign,$presupuesto){
        $this->campaign=$campaign;
        $this->presupuesto=$presupuesto;
    }

    public function render(){

        // Info de promedios
        $promedios=CampaignPresupuestoPickingtransporte::where('presupuesto_id',$this->presupuesto->id)->get();
        $totalStores=VCampaignPromedio::where('campaign_id',$this->campaign->id)->count();

        return view('livewire.campaigns.presupuesto.presupuesto-datos',compact('promedios','totalStores'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
