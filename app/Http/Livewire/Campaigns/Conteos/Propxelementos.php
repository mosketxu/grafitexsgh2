<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class Propxelementos extends Component
{
    use WithPagination;

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
        ->get();

        return view('livewire.campaigns.conteos.propxelementos',compact('propxelementos'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
