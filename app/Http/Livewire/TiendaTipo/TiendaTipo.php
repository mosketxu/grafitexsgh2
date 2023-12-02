<?php

namespace App\Http\Livewire\TiendaTipo;

use App\Models\TiendaTipo as ModelsTiendaTipo;
use Livewire\Component;
use Illuminate\Validation\Rule;

class TiendaTipo extends Component
{
    public $tiendatipo;
    public $tipo;
    public $ruta;
    public $deshabilitado='';

    protected function rules(){
        return [
            'tipo'=>'required|unique:tienda_tipos,tiendatipo',
        ];
    }

    public function messages(){
        return [
            'tiendatipo.required' => 'El tipo de la tienda es necesario',
            'tiendatipo.unique' => 'El tipo ya existe',
        ];
    }

    public function mount(ModelsTiendaTipo $tiendatipo, $ruta){
        $this->tiendatipo=$tiendatipo;
        if($tiendatipo->id){
            $this->tipo=$tiendatipo->tiendatipo;
        }
        $this->ruta=$ruta;
    }

    public function render(){
        $tiendatipos=ModelsTiendaTipo::orderBy('tiendatipo')->get();
        $tiendatipo=$this->tiendatipo;

        return view('livewire.tienda-tipo.tienda-tipo',compact('tiendatipos'));
    }

    public function save(){
        if($this->tiendatipo->id){
            $i=$this->tiendatipo->id;
            $this->validate([
                'tipo'=>[
                    'required',
                    Rule::unique('tienda_tipos','tiendatipo')->ignore($this->tiendatipo->id)],
            ]);
            $mensaje="Tipo actualizado satisfactoriamente";
        }else{
            $this->validate([
                'tipo'=>[
                    'required',
                    Rule::unique('tienda_tipos','tiendatipo')],
            ]);
            $i=$this->tiendatipo->id;
            $mensaje="Tipo creado satisfactoriamente";
        }

        $tiendatipo=ModelsTiendaTipo::updateOrCreate([
            'id'=>$i
            ],
            [
            'tiendatipo'=>$this->tipo,
            ]
        );

        $this->tiendatipo=$tiendatipo;

        $this->dispatchBrowserEvent('notify', $mensaje);
    }
}
