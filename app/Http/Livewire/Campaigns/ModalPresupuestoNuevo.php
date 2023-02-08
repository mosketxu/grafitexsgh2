<?php

namespace App\Http\Livewire\Campaigns;

use App\Models\CampaignPresupuesto;
use Livewire\Component;

class ModalPresupuestoNuevo extends Component
{

    public $muestramodal=false;
    public $campaign;

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render()
    {
        return view('livewire.campaigns.modal-presupuesto-nuevo');
    }

    public function cambiamodal(){$this->muestramodal= $this->muestramodal==false ? true : false;}

}
