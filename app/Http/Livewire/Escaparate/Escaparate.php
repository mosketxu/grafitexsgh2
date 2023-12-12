<?php

namespace App\Http\Livewire\Escaparate;

use App\Models\Escaparate as ModelsEscaparate;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Escaparate extends Component
{
    public $escaparate;
    public $escaparatenombre='';
    public $escaparateid='';
    public $ancho='0';
    public $alto='0';
    public $area='0';
    public $observaciones;
    public $ruta;
    public $deshabilitado='';

    protected function rules(){
        return [
            'escaparatenombre'=>'required|unique:escaparates,escaparate',
        ];
    }

    public function messages(){
        return [
            'escaparatenombre.required' => 'El escaparate es necesario',
            'escaparatenombre.unique' => 'El escaparate ya existe',
        ];
    }

    public function mount(ModelsEscaparate $escaparate, $ruta){
        if($escaparate->count()>0){
            $this->escaparate=$escaparate;
            $this->escaparateid=$escaparate->id;
            $this->escaparatenombre=$escaparate->escaparate;
            $this->ancho=$escaparate->ancho;
            $this->alto=$escaparate->alto;
            $this->observaciones=$escaparate->observaciones;
        }
        $this->ruta=$ruta;
    }

    public function render(){
        $escaparates=ModelsEscaparate::orderBy('escaparate')->get();
        $escaparate=$this->escaparate;

        return view('livewire.escaparate.escaparate',compact('escaparates'));
    }

    public function UpdatedAncho() {
        $this->escaparatenombre=$this->ancho . 'x' . $this->alto;
        $this->area=round($this->ancho * $this->alto /1000,2);
    }

    public function UpdatedAlto() {
        $this->escaparatenombre=$this->ancho . 'x' . $this->alto;
        $this->area=round($this->ancho * $this->alto /1000,2);
    }

    public function save(){
        if($this->escaparateid!=''){
            $i=$this->escaparateid;
            $this->validate([
                'escaparatenombre'=>[
                    'required',
                    Rule::unique('escaparates','escaparate')->ignore($this->escaparateid)],
            ]);
            $mensaje="Escaparate actualizado satisfactoriamente";
        }else{
            $this->validate([
                'escaparatenombre'=>[
                    'required',
                    Rule::unique('escaparates','escaparate')],
            ]);
            $i=$this->escaparateid;
            $mensaje="Escaparate creado satisfactoriamente";
        }

        $escaparate=ModelsEscaparate::updateOrCreate([
            'id'=>$i
            ],
            [
            'escaparate'=>$this->escaparatenombre,
            'ancho'=>$this->ancho,
            'alto'=>$this->alto,
            'area'=>$this->area,
            'observaciones'=>$this->observaciones,
            ]
        );

        $this->escaparate=$escaparate;

        $this->dispatchBrowserEvent('notify', $mensaje);
    }
}
