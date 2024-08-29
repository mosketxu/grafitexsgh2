<?php

namespace App\Http\Livewire\Stores;

use App\Models\{Area, Country,Segmento,Channel,StoreCluster,Storeconcept,Furniture};
use Livewire\Component;

class Modalstores extends Component
{
    public $muestramodalstores=false;

    public function render()
    {
        $countries=Country::get();
        $areas=Area::orderBy('area')->get();
        $segmentos=Segmento::orderBy('segmento')->get();
        $channels=Channel::orderBy('channel')->get();
        $storeclusters=StoreCluster::orderBy('store_cluster')->get();
        $conceptos=Storeconcept::orderBy('storeconcept')->get();
        $furnitures=Furniture::orderBy('furniture_type')->get();
        return view('livewire.stores.modalstores',compact('areas','countries','segmentos','channels','storeclusters','conceptos','furnitures'));
    }

    public function cambiamodalstores(){$this->muestramodalstores= $this->muestramodalstores==false ? true : false;}

}
