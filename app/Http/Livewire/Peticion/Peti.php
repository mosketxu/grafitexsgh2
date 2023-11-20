<?php

namespace App\Http\Livewire\Peticion;

use App\Http\Livewire\PeticionDetalle\PetiDetalle;
use App\Models\Peticion;
use App\Models\PeticionDetalle;
use App\Models\EstadoPeticion;
use App\Models\PeticionHistorial;
use App\Models\Store;
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
    public $estado='1';
    public $estadotexto='';
    public $ruta;
    public $detalles;
    public $historial;
    public $solicitadopor;

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
        $this->fecha=$peticion->fecha;
        $this->total=!$peticion->total? '0': $peticion->total ;
        $this->observaciones=$peticion->observaciones;
        $this->estado=$peticion->estadopeticion_id;
        $this->estadotexto=$peticion->estado->estadopeticion ?? 'Pendiente Solicitud';
        $this->ruta=$ruta;
        $this->detalles=PeticionDetalle::where('peticion_id',$peticion->id)->get();
        $this->historial=PeticionHistorial::query()
            ->with('usuario','estadohistorial')
            ->where('peticion_id',$peticion->id)->get();
        if(Auth::user()->hasRole('tienda')){
            $sto=Store::find(Auth::user()->name);
            $this->solicitadopor=$sto->id . '-' . $sto->name;
        }
        else
        $this->solicitadopor=Auth::user()->name;
        $this->deshabilitado=$this->peticion->estadopeticion_id>'1' ? 'disabled' : '';
    }

    public function render(){
        if (!$this->estado) $this->estado=1;
        if (!$this->fecha) $this->fecha=now();
        $peticion=$this->peticion;
        return view('livewire.peticion.peti');
    }

    public function save(){

        if(!$this->total) $this->total=0;
        if($this->peticion->id){
            $i=$this->peticion->id;
            $this->validate([
                'peti'=>[
                    'required',
                    Rule::unique('peticiones','id')->ignore($this->peticion->id)],
                    'fecha'=>'date|required',
                ]);
            $mensaje="Peticion actualizada satisfactoriamente";
        }else{
            $this->validate([
                'peti'=>'required',
                'fecha'=>'date|required',
            ]);
            $i=$this->peticion->id;
            $mensaje="Peticion creada satisfactoriamente";
        }


        $pet=Peticion::updateOrCreate([
            'id'=>$i
            ],
            [
            'peticion'=>$this->peti,
            'peticionario_id'=>$this->peticionario_id,
            'estadopeticion_id'=>$this->estado,
            'total'=>$this->total,
            'fecha'=>$this->fecha,
            'observaciones'=>$this->observaciones,
            ]
        );

        $notification = array(
            'message' => 'Petición creada. Seleccione los productos.',
            'alert-type' => 'success'
        );
        // $peti=Peticion::find($pet->id);
        // dd($peti);
        // route('peticion.editar',$peticion)
        return redirect()->route('peticion.editar',$pet)->with($notification);
    }
}
