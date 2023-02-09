<?php

namespace App\Http\Livewire\Campaigns\Presupuesto;

use App\Models\CampaignPresupuestoDetalle;
use App\Models\VCampaignResumenElemento;
use Livewire\Component;

class PresupuestoMaterial extends Component
{
    public $campaign;
    public $presupuesto;
    public $visible=false;
    public $titulo='Materiales';

    public function mount($campaign,$presupuesto){
        $this->campaign=$campaign;
        $this->presupuesto=$presupuesto;
    }

    public function render(){
$materiales=VCampaignResumenElemento::where('campaign_id',$this->campaign->id)->get();
        $totalMateriales=CampaignPresupuestoDetalle::where('presupuesto_id',$this->presupuesto->id)->sum('total');

        return view('livewire.campaigns.presupuesto.presupuesto-material',compact('materiales','totalMateriales'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
