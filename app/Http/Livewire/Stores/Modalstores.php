<?php

namespace App\Http\Livewire\Stores;

use App\Models\{Area,Country,Segmento,Storeconcept,Furniture};
use Livewire\Component;

class Modalstores extends Component
{
    public $muestramodalstores=false;

    public function render()
    {
        $countries=Country::get();
        $areas=Area::orderBy('area')->get();
        $segmentos=Segmento::orderBy('segmento')->get();
        $conceptos=Storeconcept::orderBy('storeconcept')->get();
        $furnitures=Furniture::orderBy('furniture_type')->get();
        return view('livewire.stores.modalstores',compact('areas','countries','segmentos','conceptos','furnitures'));
    }

    public function cambiamodalstores(){$this->muestramodalstores= $this->muestramodalstores==false ? true : false;}

}
