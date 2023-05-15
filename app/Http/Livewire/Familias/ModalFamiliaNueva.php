<?php

namespace App\Http\Livewire\Familias;

use App\Models\Tarifa;
use Livewire\Component;

class ModalFamiliaNueva extends Component
{
    public $muestramodal=false;

    public function render()
    {
        $tarifas=Tarifa::orderBy('familia')->get();
        return view('livewire.familias.modal-familia-nueva',compact('tarifas'));
    }

    public function cambiamodal(){$this->muestramodal= $this->muestramodal==false ? true : false;}
}
