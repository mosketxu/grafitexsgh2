<?php

namespace App\Http\Livewire\Campaigns;

use Livewire\Component;

class ModalAcciones extends Component
{

    public $muestramodalacciones=false;
    public $campaign;

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render(){
        return view('livewire.campaigns.modal-acciones');
    }

    public function cambiamodalacciones(){$this->muestramodalacciones= $this->muestramodalacciones==false ? true : false;}

}
