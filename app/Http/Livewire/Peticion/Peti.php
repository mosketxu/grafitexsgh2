<?php

namespace App\Http\Livewire\Peticion;

use App\Http\Livewire\PeticionDetalle\PetiDetalle;
use App\Models\Peticion;
use App\Models\PeticionDetalle;
use App\Models\PeticionEstado;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Peti extends Component
{

    public $peticion;
    public $peti;
    public $peticionario_id;
    public $fecha;
    public $total='0';
    public $observaciones;
    public $estado='';
    public $ruta;
    public $detalles;

    public $deshabilitado='';

    protected function rules(){
        return [
            'peti'=>'required|unique:peticiones,id',
            'peticionario_id'=>'required',
            'estado'=>'nullable',
            'fecha'=>'date|required',
            'total'=>'nullable|numeric',
            'observaciones'=>'nullable',
        ];
    }

    public function messages(){
        return [
            'peti.required' => 'Una breve descripción de la petición es necesario',
            'peticionario_id.required' => 'El  peticionario es necesario',
            'fecha.required' => 'La fecha es necesaria',
        ];
    }

    public function mount(Peticion $peticion, $ruta){
        $this->peticion=$peticion;
        $this->peti=$peticion->peticion;
        $this->peticionario_id=!$peticion->peticionario_id ? Auth::user()->id : $peticion->peticionario_id ;
        // dd($this->peticionario_id);
        $this->fecha=$peticion->fecha;
        $this->total=!$peticion->total? '0': $peticion->total ;
        $this->observaciones=$peticion->observaciones;
        $this->estado=$peticion->estado;
        $this->ruta=$ruta;
        $this->detalles=PeticionDetalle::where('peticion_id',$peticion->id)->get();
        // $this->deshabilitado=Auth::user()->hasRole(['tienda','sgh']) ? 'disabled' : '';
    }

    public function render(){
        if (!$this->estado) $this->estado=1;
        if (!$this->fecha) $this->fecha=now();
        $estados=PeticionEstado::get();
        $peticion=$this->peticion;

        return view('livewire.peticion.peti',compact('estados'));
    }

    public function save(){
        if(!$this->total) $this->total=0;
        if($this->peticion->id){
            $i=$this->peticion->id;
            $this->validate([
                'peti'=>[
                    'required',
                    Rule::unique('peticiones','id')->ignore($this->peticion->id)],
            ]);
            $mensaje="Peticion actualizada satisfactoriamente";
        }else{
            $this->validate([
                'peti'=>['required','descripcion'=>'nullable']]);
            $i=$this->peticion->id;
            $mensaje="Peticion creada satisfactoriamente";
        }

        $peticion=Peticion::updateOrCreate([
            'id'=>$i
            ],
            [
            'peticion'=>$this->peti,
            'peticionario_id'=>$this->peticionario_id,
            'peticionestado_id'=>$this->estado,
            'total'=>$this->total,
            'fecha'=>$this->fecha,
            'observaciones'=>$this->observaciones,
            ]
        );

        $this->peticion=$peticion;


        $this->dispatchBrowserEvent('notify', $mensaje);
        // return redirect()->route('peticion.edit',$peticion)->with($notification);
    }
}
