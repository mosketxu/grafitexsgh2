<?php

namespace App\Http\Livewire\Tarifas;

use App\Models\Tarifa;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Tarifas extends Component
{
    public $visible=false;
    public $titulo='';
    public $tipo='';
    public $color='';
    public $campo='';
    public $buscar='';
    public $search='';

    public function mount($tipo,$titulo,$color,$campo,$buscar){
        $this->tipo=$tipo;
        $this->titulo=$titulo;
        $this->color=$color;
        $this->campo=$campo;
        $this->buscar=$buscar;
    }
    public function render(){
        $tarifas = Tarifa::where('tipo',$this->tipo)->search('familia',$this->search)->paginate(50);
        return view('livewire.tarifas.tarifas',compact('tarifas'));
    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

    public function changeCampo(Tarifa $valor,$campo,$valorcampo){

        Validator::make(['valorcampo'=>$valorcampo],[
                'valorcampo'=>'numeric'],['valorcampo.numeric'=>'El precio debe ser numerico'])->validate();

        $t=Tarifa::find($valor->id);
        $t->$campo=$valorcampo;
        $t->save();
        $this->dispatchBrowserEvent('notify', 'Actualizado.');
    }
}
