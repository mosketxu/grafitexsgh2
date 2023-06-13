<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class Cartelerias extends Component{
    use WithPagination;

    public $campaign;
    public $visible=false;
    public $titulo='Por Carteleria';

        public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render(){
        $cartelerias=CampaignElemento::tienda($this->campaign->id)
        ->select('carteleria', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('carteleria')
        ->get();

        return view('livewire.campaigns.conteos.cartelerias',compact('cartelerias'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
