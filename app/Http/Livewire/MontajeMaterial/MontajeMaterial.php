<?php

namespace App\Http\Livewire\MontajeMaterial;

use Livewire\Component;
use App\Models\MontajeMaterial as ModelsMontajematerial;
use Illuminate\Validation\Rule;

class MontajeMaterial extends Component
{
    public $montajematerial;
    public $montajematerialname;
    public $ruta;
    public $deshabilitado='';

    protected function rules(){
        return [
            'montajematerialname'=>'required|unique:montaje_materiales,montajematerial',
        ];
    }

    public function messages(){
        return [
            'montajematerialname.required' => 'El material del montaje es necesario',
            'montajematerialname.unique' => 'El material ya existe',
        ];
    }

    public function mount(ModelsMontajematerial $montajematerial, $ruta){
        $this->montajematerial=$montajematerial;
        if($montajematerial->id){
            $this->montajematerialname=$montajematerial->montajematerial;
        }
        $this->ruta=$ruta;
    }

    public function render(){
        $montajemateriales=Modelsmontajematerial::orderBy('montajematerial')->get();
        $montajematerial=$this->montajematerial;

        return view('livewire.montaje-material.montaje-material',compact('montajemateriales'));
    }

    public function save(){
        if($this->montajematerial->id){
            $i=$this->montajematerial->id;
            $this->validate([
                'montajematerialname'=>[
                    'required',
                    Rule::unique('montaje_materiales','montajematerial')->ignore($this->montajematerial->id)],
            ]);
            $mensaje="Material de montaje actualizado satisfactoriamente";
        }else{
            $this->validate([
                'montajematerialname'=>[
                    'required',
                    Rule::unique('montaje_materiales','montajematerial')],
            ]);
            $i=$this->montajematerial->id;
            $mensaje="Material de montaje creado satisfactoriamente";
        }

        $montajematerial=Modelsmontajematerial::updateOrCreate([
            'id'=>$i
            ],
            [
            'montajematerial'=>$this->montajematerialname,
            ]
        );

        $this->montajematerial=$montajematerial;

        $this->dispatchBrowserEvent('notify', $mensaje);
    }
}
