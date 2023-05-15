<?php

namespace App\Http\Livewire\Familias;

use App\Models\Tarifa;
use App\Models\TarifaFamilia;
use Livewire\Component;

class Familia extends Component
{

    public $visible=true;
    public $search='';
    public $color='';
    public $tarifa;
    public $tarifaid;
    public $material;
    public $medida;



    public function mount($tarifa){
        $this->tarifa=$tarifa;
        $this->tarifaid=$tarifa->tarifa_id;;
        $this->material=$tarifa->material;;
        $this->medida=$tarifa->medida;;

    }

    public function render(){
        $tarifas = Tarifa::where('tipo',0)->orderBy('familia')->get();
        return view('livewire.familias.familia',compact('tarifas'));
    }

    public function save(){
        $this->tarifa->tarifa_id=$this->tarifaid;
        $this->tarifa->material=$this->material;
        $this->tarifa->medida=$this->medida;
        $this->tarifa->save();
        $this->dispatchBrowserEvent('notify', 'Tarifa actualizada!');
        $this->emit('refreshfam');
    }


    public function delete($id){
        $tarifaborrar = TarifaFamilia::find($id);
        if ($tarifaborrar) {
            $tarifaborrar->delete();
            $this->dispatchBrowserEvent('notify', 'Tarifa eliminada!');
        }
        $this->emit('refreshfam');
    }

}
