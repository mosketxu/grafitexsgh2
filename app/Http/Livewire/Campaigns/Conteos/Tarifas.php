<?php

namespace App\Http\Livewire\Campaigns\Conteos;

use App\Models\Tarifa;
use Livewire\Component;

class Tarifas extends Component
{
    public $campaign;
    public $visible=false;
    public $titulo='Por Tarifas';


    public function mount($campaign){
        $this->campaign=$campaign;
    }


    public function render()
    {
        $tarifas=Tarifa::where('tipo','0')
        ->paginate(10);
        return view('livewire.campaigns.conteos.tarifas',compact('tarifas'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

}
