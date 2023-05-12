<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class Detallado extends Component{

    use WithPagination;

    public $campaign;
    public $visible=false;
    public $titulo='Detallado';


    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render(){
        $conteodetallado=CampaignElemento::tienda($this->campaign->id)
        ->select('segmento','ubicacion','medida','mobiliario','area','material', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('segmento','ubicacion','medida','mobiliario','area','material')
        ->paginate('20');
        return view('livewire.campaigns.conteos.detallado',compact('conteodetallado'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
