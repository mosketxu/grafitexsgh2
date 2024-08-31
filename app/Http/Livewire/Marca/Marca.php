<?php

namespace App\Http\Livewire\Marca;

use App\Models\Marca as ModelsMarca;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Marca extends Component
{
    public $marca;
    public $siglasmarca;
    public $marcaname;
    public $ruta;
    public $deshabilitado='';

    protected function rules(){
        return [
            'siglasmarca'=>'required|unique:marcas,siglasmarca',
            'marcaname'=>'required|unique:marcas,marcaname',
        ];
    }

    public function messages(){
        return [
            'siglasmarca.required' => 'Las siglas de la marca son necesarias.',
            'siglasmarca.unique' => 'Las siglas de la marca ya existen',
            'marcaname.required' => 'La marca es necesaria.',
            'marcaname.unique' => 'La marca ya existe',
        ];
    }

    public function mount(ModelsMarca $marca, $ruta){
        $this->marca=$marca;
        if($marca->id){
            $this->siglasmarca=$marca->siglasmarca;
            $this->marcaname=$marca->marcaname;
        }
        $this->ruta=$ruta;
    }

    public function render(){
        $marcas=ModelsMarca::orderBy('marcaname')->get();
        $marca=$this->marca;

        return view('livewire.marca.marca',compact('marcas'));
    }

    public function save(){
        if($this->marca->id){
            $i=$this->marca->id;
            $this->validate([
                'marcaname'=>[
                    'required',
                    Rule::unique('marcas','marcaname')->ignore($this->marca->id)],
                'siglasmarca'=>[
                    'required',
                    Rule::unique('marcas','siglasmarca')->ignore($this->marca->id)],
            ]);
            $mensaje="Marca actualizada satisfactoriamente";
        }else{
            $this->validate([
                'marcaname'=>[
                    'required',
                    Rule::unique('marcas','marcaname')],
                'siglasmarca'=>[
                    'required',
                    Rule::unique('marcas','siglasmarca')],
            ]);
            $i=$this->marca->id;
            $mensaje="Marca creada satisfactoriamente";
        }

        $marca=ModelsMarca::updateOrCreate([
            'id'=>$i
            ],
            [
            'siglasmarca'=>$this->siglasmarca,
            'marcaname'=>$this->marcaname,
            ]
        );

        $this->marca=$marca;

        $this->dispatchBrowserEvent('notify', $mensaje);
    }
}
