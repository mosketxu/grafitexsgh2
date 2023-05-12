<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\CampaignElemento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class Mobiliarios extends Component
{
    use WithPagination;

    public $campaign;
    public $visible=false;
    public $titulo='Por Mobiliario';

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render()
    {
        $mobiliarios=CampaignElemento::tienda($this->campaign->id)
        ->select('mobiliario', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('mobiliario')
        ->paginate(10);

        return view('livewire.campaigns.conteos.mobiliarios',compact('mobiliarios'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
