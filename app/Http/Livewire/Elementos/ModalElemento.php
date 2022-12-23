<?php

namespace App\Http\Livewire\Elementos;

use Livewire\Component;
use App\Models\{ Ubicacion, Carteleria, Material, Medida, Mobiliario, Propxelemento, Tarifa};

class ModalElemento extends Component
{
    public $muestramodal=false;

    public function render(){
        $ubicaciones=Ubicacion::orderBy('ubicacion')->get();
        $mobiliarios=Mobiliario::orderBy('mobiliario')->get();
        $props=Propxelemento::orderBy('propxelemento')->get();
        $cartelerias=Carteleria::orderBy('carteleria')->get();
        $medidas=Medida::orderBy('medida')->get();
        $materiales=Material::orderBy('material')->get();
        $tarifas=Tarifa::orderBy('familia')->get();

        return view('livewire.elementos.modal-elemento',compact('ubicaciones','tarifas','mobiliarios','props','cartelerias','medidas','materiales'));
    }

    public function cambiamodal(){$this->muestramodal= $this->muestramodal==false ? true : false;}
}
