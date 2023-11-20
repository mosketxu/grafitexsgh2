<?php

namespace App\Http\Livewire\PeticionHistorial;

use App\Models\EstadoPeticion;
use Livewire\Component;
use App\Models\Peticion;
use App\Models\PeticionHistorial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;

class PetiHistorial extends Component
{
    public $peticion;
    public $petihistorial;
    public $peticion_id;
    public $estadopeticion_id;
    public $observaciones;
    public $user_id;
    // public $fecha;
    public $username;

    protected function rules(){
        return [
            'estadopeticion_id'=>'required',
            // 'fecha'=>'required',
            'user_id'=>'required',
            'observaciones'=>'nullable',
        ];
    }

    public function messages(){
        return [
            'estadopeticion_id.required' => 'El Estado en necesario',
            // 'fecha.required' => 'La fecha es necesaria',
        ];
    }

    public function mount(Peticion $peticion){
        $this->peticion=$peticion;
        $this->user_id=Auth::user()->id;
        $this->username=Auth::user()->name;
        // $this->fecha=Carbon::now();
    }

    public function render(){
        if(Auth::user()->hasRole('tienda'))
            $estados=EstadoPeticion::where('validador','tienda')->get();
        elseif(Auth::user()->hasRole('sgh'))
            $estados=EstadoPeticion::where('validador','sgh')->get();
        else
            $estados=EstadoPeticion::where('validador','grafitex')->get();
        return view('livewire.peticion-historial.peti-historial',compact(['estados']));
    }

    public function save(){
        $this->validate();

        $petidet=PeticionHistorial::Create([
                'peticion_id'=>$this->peticion->id,
                'user_id'=>$this->user_id,
                'estadopeticion_id'=>$this->estadopeticion_id,
                // 'fecha'=>$this->fecha,
                'observaciones'=>$this->observaciones,
            ]
        );


        $this->peticion->estadopeticion_id=$this->estadopeticion_id;
        $this->peticion->save();

        $notification = array(
            'message' => 'Historial actualizado satisfactoriamente!',
            'alert-type' => 'success'
        );

        $this->dispatchBrowserEvent('notify', 'Entrada añadida satisfactoriamente');
        return redirect()->route('peticion.editar',$this->peticion)->with($notification);
        // route('peticion.editar',$peticion)
    }

}
