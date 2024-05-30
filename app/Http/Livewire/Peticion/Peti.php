<?php

namespace App\Http\Livewire\Peticion;

use App\Http\Livewire\PeticionDetalle\PetiDetalle;
use App\Models\Peticion;
use App\Models\PeticionDetalle;
use App\Models\EstadoPeticion;
use App\Models\PeticionHistorial;
use App\Models\Producto;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Peti extends Component
{

    public $peticion;
    public $peti;
    public $peticionario_id;
    public $peticionario;
    public $fecha;
    public $total='0';
    public $observaciones;
    public $estado='1';
    public $estadotexto='';
    public $peticionestado_id='0';
    public $ruta;
    public $detalles;
    public $historial;
    public $solicitadopor;
    public $storearea='';
    public $peticionpendiente;
    public $saltarctrolnuevo;

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

    public function mount(Peticion $peticion, $ruta,$saltarctrolnuevo ){
        $this->peticion=$peticion;
        $this->peti=$peticion->peticion;
        $this->peticionestado_id=$peticion->peticionestado_id;
        $this->peticionario_id=!$peticion->peticionario_id ? Auth::user()->id : $peticion->peticionario_id ;
        $this->fecha=$peticion->fecha;
        if($this->fecha=='')
            $this->fecha = Carbon::now()->format('Y-m-d');
        $this->total=!$peticion->total? '0': $peticion->total ;
        $this->observaciones=$peticion->observaciones;
        $this->estado=$peticion->peticionestado_id;
        $this->estadotexto=$peticion->estado->estadopeticion ?? 'Pendiente Solicitud';
        $this->ruta=$ruta;
        $this->saltarctrolnuevo=$saltarctrolnuevo;
        $this->detalles=PeticionDetalle::where('peticion_id',$peticion->id)->get();
        $this->historial=PeticionHistorial::query()
            ->with('usuario','estadohistorial')
            ->with('usuario.store',)
            ->where('peticion_id',$peticion->id)->get();

        if(Auth::user()->hasRole('tienda')){
            $sto=Store::find(Auth::user()->name);
            $this->solicitadopor=$sto->id . '-' . $sto->name;
            $this->storearea=$sto->area;
            $this->peticionario=User::where('name',$sto->id)->first();
            $this->peticionpendiente=Peticion::where('peticionario_id',$this->peticionario->id)->where('peticionestado_id','<','7')->count();
            if($saltarctrolnuevo=='si') $this->peticionpendiente='0';
        }
        else
        $this->solicitadopor=Auth::user()->name;
        $this->deshabilitado=$this->peticion->peticionestado_id>'1' ? 'disabled' : '';
    }

    public function render(){
        if (!$this->estado) $this->estado=1;
        if (!$this->fecha) $this->fecha=Carbon::now()->format('Y-m-d');
        $peticion=$this->peticion;
        $vista='livewire.peticion.peti';

        if($this->peticionpendiente>0){
            $this->peticion=Peticion::where('peticionario_id',$this->peticionario->id)->where('peticionestado_id','<','7')->first();
            $vista='livewire.peticion.peticionpendiente';
        }
        return view($vista);
    }

    public function save(){
        if(!$this->total) $this->total=0;
        $this->peticionestado_id=$this->peticionestado_id=='0' ? '1' : $this->peticionestado_id;
        if($this->peticion->id){
            $i=$this->peticion->id;
            $this->validate([
                'peti'=>[
                    'required',
                    Rule::unique('peticiones','id')->ignore($this->peticion->id)],
                'fecha'=>'date|required',
                'peticionario_id'=>'required',
                'fecha'=>'date|required',
                ]);
            $mensaje="Peticion actualizada satisfactoriamente";
        }else{
            $this->validate([
                'peti'=>'required',
                'fecha'=>'date|required',
                'fecha'=>'date|required',
                'peticionario_id'=>'required',
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
            'peticionestado_id'=>$this->estado,
            'total'=>$this->total,
            'fecha'=>$this->fecha,
            'observaciones'=>$this->observaciones,
            ]
        );

        if(PeticionDetalle::where('peticion_id',$pet->id)->count()==0){
            $productopicking=Producto::where('producto','Base')->first();
            PeticionDetalle::create([
                'peticion_id'=>$pet->id,
                'producto_id'=>$productopicking->id,
                'comentario'=>$productopicking->descripcion,
                'unidades'=>'1',
                'preciounidad'=>$productopicking->precio,
                'total'=>$productopicking->precio,
            ]);

            if($this->storearea=='Portugal')
                $envio="EnvioPortugal";
            elseif($this->storearea=='Canarias')
                $envio="EnvioCanarias";
            else
                $envio="EnvíoNacionalPenínsula";

    $productoenvio=Producto::where('producto',$envio)->first();
            PeticionDetalle::create([
                'peticion_id'=>$pet->id,
                'producto_id'=>$productoenvio->id,
                'comentario'=>$productoenvio->descripcion,
                'unidades'=>'1',
                'preciounidad'=>$productoenvio->precio,
                'total'=>$productoenvio->precio,
            ]);
            $pet->total=$pet->total+$productopicking->precio+$productoenvio->precio;
            $pet->save();
        }

        $notification = array(
            'message' => 'Petición creada. Seleccione los productos.',
            'alert-type' => 'success'
        );
        return redirect()->route('peticion.editar',$pet)->with($notification);
    }
}
