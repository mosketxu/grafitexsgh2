<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Propxelementos extends Component
{
    public $campaign;
    public $visible=false;
    public $titulo='Por Prop x Elemento';

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render()
    {
        $propxelementos=CampaignElemento::tienda($this->campaign->id)
        ->select('propxelemento', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('propxelemento')
        ->paginate(10);

        return view('livewire.campaigns.conteos.propxelementos',compact('propxelementos'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
