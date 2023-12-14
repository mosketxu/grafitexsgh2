<?php

namespace App\Http\Livewire\PeticionHistorial;

use App\Mail\MailPeticion;
use App\Mail\MailPeticionSGH;
use App\Models\{Destinatario, User,Peticion,EstadoPeticion, PeticionDetalle, PeticionHistorial, Store};
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PetiHistorial extends Component
{
    public $peticion;
    public $petihistorial;
    public $peticion_id;
    public $peticionestado_id;
    public $observaciones;
    public $user_id;
    // public $fecha;
    public $username;

    protected function rules(){
        return [
            'peticionestado_id'=>'required',
            // 'fecha'=>'required',
            'user_id'=>'required',
            'observaciones'=>'nullable',
        ];
    }

    public function messages(){
        return [
            'peticionestado_id.required' => 'El Estado en necesario',
            // 'fecha.required' => 'La fecha es necesaria',
        ];
    }

    public function mount(Peticion $peticion){
        $this->peticion=$peticion;
        $this->user_id=Auth::user()->id;
        if(Auth::user()->hasRole('tienda'))
            $this->username=Store::where('id',Auth::user()->name)->first()->name;
        else
            $this->username=Auth::user()->name;
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
                'peticionestado_id'=>$this->peticionestado_id,
                // 'fecha'=>$this->fecha,
                'observaciones'=>$this->observaciones,
            ]
        );

        $this->peticion->peticionestado_id=$this->peticionestado_id;
        $this->peticion->save();

        $notification = array(
            'message' => 'Historial actualizado satisfactoriamente!',
            'alert-type' => 'success'
        );

        $this->dispatchBrowserEvent('notify', 'Entrada añadida satisfactoriamente');

        if(Auth::user()->hasRole('sgh'))
            $this->enviarpeticionSGH($this->peticion,$petidet,$this->peticionestado_id);
        // se decide que grafitex no manda mail una vez aceptada
        // elseif(Auth::user()->hasRole('grafitex'))
        //     $this->enviarpeticionGrafitex($this->peticion,$this->peticionestado_id);
        // si es tienda se lanza desde el botón

        return redirect()->route('peticion.editar',$this->peticion)->with($notification);

    }

    public function enviarpeticionSGH(Peticion $peticion,$petidet,$peticionestado_id){
        $peticionario=User::where('id',$peticion->peticionario_id)->first();
        $store=Store::find($peticionario->name);
        if($peticionestado_id=='4')
            $cuerpo='Se ha aceptado la petición: '.$peticion->id. ' de la tienda ' . $store->name;
        elseif($peticionestado_id=='3')
            $cuerpo='Se ha rechazado la petición: '.$peticion->id. ' de la tienda ' . $store->name;
        $details=[
            // 'de'=>'alex.arregui@sumaempresa.com',
            'asunto'=>'Aceptación de peticion nº:' .$peticion->id ,
            'cuerpo'=>'peticionSGH',
            'storename'=>$store->name,
            'storeId'=>$store->id,
            'cuerpo'=>$cuerpo,
            'observaciones'=>$petidet->observaciones,

        ];

        $destinatarios=Destinatario::where('empresa','Grafitex')->get();

        $elementos= PeticionDetalle::where('peticion_id',$peticion->id)->get();

        $notification='';

        foreach ($destinatarios as $destinatario) {
            Mail::to($destinatario->mail)->send(new MailPeticionSGH($details,$elementos,$peticion));
            $notification = array(
                'message' => '¡Mail de peticion enviado!',
                'alert-type' => 'success',
            );
        }
        return redirect()->back()->with($notification);
    }

}
