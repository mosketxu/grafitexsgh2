<?php

namespace App\Http\Livewire\Entidad;

use App\Models\{Area, Entidad, EntidadArea, EntidadContacto,  MetodoPago,Pais,Provincia, User};
// use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Validation\Rule;

// use HasRoles;

class Ent extends Component
{
    public $entidad;
    public $fechacli;
    public $contactoId;
    public $departamento;
    public $comentario;
    public $contacto;
    public $area='';
    public $observaciones='';
    public $escontacto='';
    public $ruta='';

    protected function rules(){
        return [
            'entidad.id'=>'nullable',
            'entidad.entidad'=>'required',
            'entidad.responsable'=>'nullable|numeric',
            'entidad.montador'=>'nullable',
            'entidad.nif'=>'nullable|max:12',
            'entidad.direccion'=>'nullable',
            'entidad.cp'=>'nullable|max:10',
            'entidad.localidad'=>'nullable',
            'entidad.provincia'=>'nullable',
            'entidad.pais_id'=>'nullable',
            'entidad.tfno'=>'nullable',
            'entidad.emailgral'=>'nullable',
            'entidad.emailadm'=>'nullable',
            'entidad.emailaux'=>'nullable',
            'entidad.web'=>'nullable',
            'entidad.banco1'=>'nullable',
            'entidad.banco2'=>'nullable',
            'entidad.iban1'=>'nullable',
            'entidad.iban2'=>'nullable',
            'entidad.metodopago_id'=>'nullable',
            'entidad.diavencimiento'=>'numeric|nullable',
            'entidad.vencimientofechafactura'=>'numeric|nullable',
            'entidad.credito'=>'nullable',
            'entidad.importecredito'=>'numeric|nullable',
            'entidad.empresacredito'=>'nullable',
            'entidad.vigenciacredito'=>'nullable',
            'entidad.observaciones'=>'nullable',
            'entidad.user_id'=>'nullable',
            'entidad.useremail'=>'nullable|email',
            'entidad.password'=>'nullable',
        ];
    }

    public function messages(){
        return [
            'entidad.entidad.required' => 'El nombre de la entidad es necesario',
            'entidad.nif.max' => 'El Nif debe ser inferior a 12 caracteres',
            'entidad.cuentactblepro.numeric' => 'La cuenta contable del montador debe ser numérica',
            'entidad.cuentactblecli.numeric' => 'La cuenta contable del cliente debe ser numérica',
            'entidad.cp.max' => 'El código postal debe ser inferior a 8 caracteres',
            'entidad.diafactura.diavencimiento' => 'El dia de vencimiento debe ser numérico',
            'entidad.useremail.email'=>'El mail del usuario debe ser válido'
        ];
    }

    public function mount(Entidad $entidad, Entidad $contacto, $escontacto,$ruta){
        $this->entidad=$entidad;
        $this->contacto=$contacto;
        $this->fechacli=$this->entidad->fechacliente;
        $this->escontacto=$escontacto;
        $this->ruta=$ruta;
    }

    public function render(){
        if (!$this->entidad->estado) $this->entidad->estado=0;
        $entidad=$this->entidad;
        $contacto=$this->contacto;
        $this->contactoId=$contacto->id;


        $metodopagos=MetodoPago::all();
        $provincias=Provincia::all();
        $paises=Pais::all();

        $areasSi=EntidadArea::where('entidad_id',$this->entidad->id)->get();
        $areasNo=Area::whereNotIn('id',$areasSi->pluck('area_id'))->get();


        return view('livewire.entidad.ent',compact('metodopagos','provincias','paises','areasSi','areasNo'));
    }

    public function save(){
        $this->validate();
        if($this->entidad->id){
            $i=$this->entidad->id;
            $this->validate([
                'entidad.entidad'=>[
                    'required',
                    Rule::unique('entidades','entidad')->ignore($this->entidad->id)],
                'entidad.nif'=>[
                    'nullable',
                    'max:12',
                    Rule::unique('entidades','nif')->ignore($this->entidad->id)],
                'entidad.email'=>[
                    'nullable',
                    'email',
                    Rule::unique('entidades','email')],
                ]
            );
            $mensaje="montador actualizado satisfactoriamente";
        }else{
            $this->validate([
                'entidad.entidad'=>'required|unique:entidades,entidad',
                'entidad.nif'=>'nullable|max:12|unique:entidades,nif',
                'entidad.cuentactblepro'=>'nullable|numeric|unique:entidades,cuentactblepro',
                'entidad.cuentactblecli'=>'nullable|numeric|unique:entidades,cuentactblecli',
                'entidad.email'=>[
                    'nullable',
                    'email',
                    Rule::unique('entidades','email')->ignore($this->entidad->id)],
                ]
            );
            $i=$this->entidad->id;
            $mensaje="montador creado satisfactoriamente";
        }
        $ent=Entidad::updateOrCreate([
            'id'=>$i
            ],
            [
            'entidad'=>$this->entidad->entidad,
            'responsable'=>$this->entidad->responsable,
            'nif'=>$this->entidad->nif,
            'montador'=>$this->entidad->montador,
            'direccion'=>$this->entidad->direccion,
            'cp'=>$this->entidad->cp,
            'localidad'=>$this->entidad->localidad,
            'provincia'=>$this->entidad->provincia,
            'pais_id'=>$this->entidad->pais_id,
            'tfno'=>$this->entidad->tfno,
            'emailgral'=>$this->entidad->emailgral,
            'emailadm'=>$this->entidad->emailadm,
            'emailaux'=>$this->entidad->emailaux,
            'banco1'=>$this->entidad->banco1,
            'banco2'=>$this->entidad->banco2,
            'iban1'=>$this->entidad->iban1,
            'iban2'=>$this->entidad->iban2,
            'metodopago_id'=>$this->entidad->metodopago_id,
            'diavencimiento'=>$this->entidad->diavencimiento,
            'vencimientofechafactura'=>$this->entidad->vencimientofechafactura,
            'credito'=>$this->entidad->credito,
            'empresacredito'=>$this->entidad->empresacredito,
            'importecredito'=>$this->entidad->importecredito,
            'vigenciacredito'=>$this->entidad->vigenciacredito,
            'observaciones'=>$this->entidad->observaciones,
            // 'user_id'=>$this->entidad->user_id,
            // 'useremail'=>$this->entidad->useremail,
            // 'password'=>$this->entidad->password,
            ]
        );
        if(!$this->entidad->id){
            $this->entidad->id=$ent->id;
        }

        //Añado contacto si existe
        if($this->contactoId){
            EntidadContacto::create([
                'contacto_id'=>$this->entidad->id,
                'entidad_id'=>$this->contactoId,
                'departamento'=>$this->departamento,
                'comentarios'=>$this->comentario,
            ]);
            // $this->dispatchBrowserEvent('notify', 'Contacto añadido con éxito');
        }
        //Creo o actualizo el usuario si existe
        $respuesta="OK";
        if($this->entidad->useremail!='') $respuesta=$this->saveuseracces();

        if($respuesta=="OK")
            $notification = array('message' => 'Operación ejecutada con éxito!','alert-type' => 'success');
        else
            $notification = array('message' => 'El mail ya esta en uso!','alert-type' => 'alarm');

        return redirect()->route('entidad.edit',$this->entidad)->with($notification);
    }

    public function saveuseracces(){
        //valido en Entidad
        $this->validate([
            'entidad.password'=>'required',
            'entidad.useremail'=>[
                'email',
                Rule::unique('entidades','useremail')->ignore($this->entidad->id)],
            ]);

        //valido en Users
        //miro si el mailexiste en la base de datos
        $mailexiste=User::where('email',$this->entidad->useremail)->first();

        if($this->entidad->user_id){// tiene user_id asi que existe en USERS y tiene ya un mail
            //busco el user con ese user_id
            $userexiste=User::find($this->entidad->user_id);
            //si el nuevo mail no existe actualizo
            if(!$mailexiste){
                $userexiste->update([
                    'name'=>$this->entidad->entidad,
                    'email'=>$this->entidad->useremail,
                    'password'=>bcrypt($this->entidad->password),
                    'updated_at'=>now(),
                ]);
                $user=$userexiste;
            }// si el mail existe busco si coinciden los id del USER que tiene ese mail y de ENT
            elseif($userexiste->id == $mailexiste->id){
                $userexiste->update([
                    'name'=>$this->entidad->entidad,
                    'email'=>$this->entidad->useremail,
                    'password'=>bcrypt($this->entidad->password),
                    'updated_at'=>now(),
                ]);
                $user=$userexiste;
            }else{
                return "Mal";
            }
        }else{
            if(!$mailexiste){// como no hay problema lo creo
                $user=User::create([
                    'name'=>$this->entidad->entidad,
                    'email'=>$this->entidad->useremail,
                    'password'=>bcrypt($this->entidad->password),
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }else{
                return "Mal";
            }
        }
        $entidad= Entidad::find($this->entidad->id);

        $entidad->update([
            'user_id'=>$user->id,
            'useremail'=>$this->entidad->useremail,
            'password'=>$this->entidad->password,
            ]
        );

        $user->assignRole('montador');
        return "OK";
    }

    public function savearea(){
        $i='';
        $e=EntidadArea::where('entidad_id',$this->entidad->id)->where('area_id',$this->area)->first();
        if($e) $i=$e->id;

        $entarea=EntidadArea::updateOrCreate([
            'id'=>$i
            ],
            [
            'entidad_id'=>$this->entidad->id,
            'area_id'=>$this->area,
            'observaciones'=>$this->observaciones,
            ]
        );

        return redirect()->route('entidad.edit',$this->entidad)->with('message','Area actualizada con éxito');

    }

    public function changeValor($valor,$v){
        $entarea=EntidadArea::find($valor['id']);
            // $p=Country::find($valor['ide']);
        $entarea->observaciones=$v;
        $entarea->save();
        $mensaje="Actualizado";
        $this->dispatchBrowserEvent('notify', $mensaje);
    }

    public function deletedatosacceso(Entidad $entidad){

        $user=User::find($entidad->user_id);
        if($user) $user->delete();
        $entidad->update([
            'user_id'=>null,
            'useremail'=>null,
            'password'=>null
        ]);


        return redirect()->route('entidad.edit',$entidad)->with('message','Datos de acceso eliminados');

    }

    public function delete($areaId){
        $entare=EntidadArea::find($areaId);
        if($entare)
            $entare->delete();

        return redirect()->route('entidad.edit',$this->entidad)->with('message','Area eliminada con éxito');

    }
}
