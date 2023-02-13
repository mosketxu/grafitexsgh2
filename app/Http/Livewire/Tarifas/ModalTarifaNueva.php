<?php

namespace App\Http\Livewire\Tarifas;

use Livewire\Component;

class ModalTarifaNueva extends Component{
    public $muestramodal=false;

    public function render()
    {
        return view('livewire.tarifas.modal-tarifa-nueva');
    }

    public function cambiamodal(){$this->muestramodal= $this->muestramodal==false ? true : false;}

}
