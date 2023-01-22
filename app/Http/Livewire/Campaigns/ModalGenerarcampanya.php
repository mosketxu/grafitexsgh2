<?php

namespace App\Http\Livewire\Campaigns;

use App\Models\Campaign;
use Livewire\Component;

class ModalGenerarcampanya extends Component
{

    public $muestramodal=false;
    public $campaign;

    public function mount($campaign){
        $this->campaign=$campaign;
    }

    public function render()
    {

        return view('livewire.campaigns.modal-generarcampanya');
    }


    public function cambiamodal(){$this->muestramodal= $this->muestramodal==false ? true : false;}

}
