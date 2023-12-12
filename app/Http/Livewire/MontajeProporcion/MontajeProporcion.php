<?php

namespace App\Http\Livewire\MontajeProporcion;

use App\Models\MontajeProporcion as ModelsMontajeProporcion;
use Illuminate\Validation\Rule;

use Livewire\Component;

class MontajeProporcion extends Component
{
    public $montajeproporcion;
    public $montajeproporcionname;
    public $ruta;
    public $deshabilitado='';

    protected function rules(){
        return [
            'montajeproporcionname'=>'required|unique:montaje_proporciones,montajeproporcion',
        ];
    }

    public function messages(){
        return [
            'montajeproporcionname.required' => 'El proporcion del montaje es necesario',
            'montajeproporcionname.unique' => 'El proporcion ya existe',
        ];
    }

    public function mount(ModelsMontajeProporcion $montajeproporcion, $ruta){
        $this->montajeproporcion=$montajeproporcion;
        if($montajeproporcion->id){
            $this->montajeproporcionname=$montajeproporcion->montajeproporcion;
        }
        $this->ruta=$ruta;
    }

    public function render(){
        $montajeproporciones=ModelsMontajeProporcion::orderBy('montajeproporcion')->get();
        $montajeproporcion=$this->montajeproporcion;

        return view('livewire.montaje-proporcion.montaje-proporcion',compact('montajeproporciones'));
    }

    public function save(){
        if($this->montajeproporcion->id){
            $i=$this->montajeproporcion->id;
            $this->validate([
                'montajeproporcionname'=>[
                    'required',
                    Rule::unique('montaje_proporciones','montajeproporcion')->ignore($this->montajeproporcion->id)],
            ]);
            $mensaje="proporcion de montaje actualizado satisfactoriamente";
        }else{
            $this->validate([
                'montajeproporcionname'=>[
                    'required',
                    Rule::unique('montaje_proporciones','montajeproporcion')],
            ]);
            $i=$this->montajeproporcion->id;
            $mensaje="proporcion de montaje creado satisfactoriamente";
        }

        $montajeproporcion=ModelsMontajeProporcion::updateOrCreate([
            'id'=>$i
            ],
            [
            'montajeproporcion'=>$this->montajeproporcionname,
            ]
        );

        $this->montajeproporcion=$montajeproporcion;

        $this->dispatchBrowserEvent('notify', $mensaje);
    }
}
