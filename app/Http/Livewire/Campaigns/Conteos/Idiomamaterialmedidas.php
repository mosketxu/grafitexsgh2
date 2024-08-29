<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Idiomamaterialmedidas extends Component
{
    use WithPagination;

    public $campaign;
    public $visible=false;
    public $titulo='Por Idioma Material Medida Mobiliario Cluster';

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render(){
        $idiomamatmobmedidas=CampaignElemento::tienda($this->campaign->id)
        // ->select('idioma','material','medida','mobiliario', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        // ->groupBy('idioma','material','medida','mobiliario')
        ->paginate(10);
        dd($idiomamatmobmedidas->first());

        $idiomamatmobmedidas=CampaignElemento::tienda($this->campaign->id)
        ->select('idioma','material','medida','mobiliario', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('idioma','material','medida','mobiliario')
        ->paginate(10);


        return view('livewire.campaigns.conteos.idiomamaterialmedidas',compact('idiomamatmobmedidas'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
