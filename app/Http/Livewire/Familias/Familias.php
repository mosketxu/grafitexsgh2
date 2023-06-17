<?php

namespace App\Http\Livewire\Familias;

use App\Models\Tarifa;
use App\Models\TarifaFamilia;
use Livewire\Component;

class Familias extends Component
{
    public $visible=false;
    public $titulo='';
    public $search='';
    public $color='';
    public $colorindex='';
    public $textocolor='';
    public $colors=array('amber','blue','cyan','emerald','fuchsia','gray','neutral','coolGray','trueGray','warmGray','green','indigo','lime','orange','pink','purple','red','rose','sky','teal','violet','yellow');
    public $familia;

    protected $listeners = [ 'refreshfam' => '$refresh'];

    public function refreshfam(){
        $this->mount();
        $this->render();
    }

    public function mount($familia,$colorindex){
        $this->familia=$familia;
        $this->colorindex=$this->colorindex>22 ? $colorindex % 22 : $colorindex;
    }

    public function render(){
        if($this->familia->id=='1') {
            $this->color="bg-white";
            $this->textocolor="text-black";
        }else{
            $this->color=$this->colors[$this->colorindex];
            $this->textocolor="text-white";
        }
        $tarifas=TarifaFamilia::where('tarifa_id',$this->familia->id)->get();
        return view('livewire.familias.familias',compact('tarifas'));
    }
}
