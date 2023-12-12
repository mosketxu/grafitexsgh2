<?php

namespace App\Http\Livewire\MontajeTipo;

use App\Models\MontajeTipo as ModelsMontajeTipo;
use Livewire\Component;
use Illuminate\Validation\Rule;

class MontajeTipo extends Component
{
    public $montajetipo;
    public $tipo;
    public $ruta;
    public $deshabilitado='';

    protected function rules(){
        return [
            'tipo'=>'required|unique:montaje_tipos,montajetipo',
        ];
    }

    public function messages(){
        return [
            'montajetipo.required' => 'El tipo del montaje es necesario',
            'montajetipo.unique' => 'El tipo ya existe',
        ];
    }

    public function mount(ModelsMontajeTipo $montajetipo, $ruta){
        $this->montajetipo=$montajetipo;
        if($montajetipo->id){
            $this->tipo=$montajetipo->montajetipo;
        }
        $this->ruta=$ruta;
    }

    public function render(){
        $montajetipos=Modelsmontajetipo::orderBy('montajetipo')->get();
        $montajetipo=$this->montajetipo;

        return view('livewire.montaje-tipo.montaje-tipo',compact('montajetipos'));
    }

    public function save(){
        if($this->montajetipo->id){
            $i=$this->montajetipo->id;
            $this->validate([
                'tipo'=>[
                    'required',
                    Rule::unique('montaje_tipos','montajetipo')->ignore($this->montajetipo->id)],
            ]);
            $mensaje="Tipo actualizado satisfactoriamente";
        }else{
            $this->validate([
                'tipo'=>[
                    'required',
                    Rule::unique('montaje_tipos','montajetipo')],
            ]);
            $i=$this->montajetipo->id;
            $mensaje="Tipo creado satisfactoriamente";
        }

        $montajetipo=Modelsmontajetipo::updateOrCreate([
            'id'=>$i
            ],
            [
            'montajetipo'=>$this->tipo,
            ]
        );

        $this->montajetipo=$montajetipo;

        $this->dispatchBrowserEvent('notify', $mensaje);
    }
}
