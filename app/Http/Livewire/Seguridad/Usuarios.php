<?php

namespace App\Http\Livewire\Seguridad;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithPagination;

    public $titulo='Usuarios';
    public $valorcampo1='';
    public $valorcampo2='';
    public $valorcampo3='';
    public $valorcampo4='';
    public $titcampo1='Usuario';
    public $titcampo2='Email';
    public $titcampo3='Password';
    public $titcampo4='Rol';
    public $campo1='name';
    public $campo2='email';
    public $campo3='password';
    public $campo4='rol';
    public $campo1visible=1;
    public $campo2visible=1;
    public $campo3visible=1;
    public $campo4visible=1;
    public $campo1disabled='';
    public $campo2disabled='';
    public $campo3disabled='disabled';
    public $campo4disabled='disabled';
    public $campo1fondo='bg-white';
    public $campo2fondo='bg-white';
    public $campo3fondo='bg-gray-100';
    public $campo4fondo='bg-gray-100';
    public $editarvisible=1;
    public $search='';


    protected $listeners = [ 'refresh' => '$refresh'];

    protected function rules()
    {
        return [
            'valorcampo1'=>'required|unique:users,name',
            'valorcampo2'=>'email|required|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'valorcampo1.required' => 'El nombre del usuario es necesario',
            'valorcampo1.unique' => 'El nombre del usuario ya existe',
            'valorcampo2.required' => 'El mail es necesario.',
            'valorcampo2.email' => 'El mail debe ser válido.',
        ];
    }


    public function render(){
        $valores=User::query()
            ->search('name',$this->search)
            ->orSearch('email',$this->search)
            ->select('id','name as valorcampo1','email as valorcampo2','password as valorcampo3')
            ->orderBy('name')
            ->paginate(10);
        return view('livewire.auxiliarcard',compact('valores'));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeCampo(User $valor,$campo,$valorcampo)
    {
        Validator::make(['valorcampo'=>$valorcampo],[
            'valorcampo'=>'required',
        ])->validate();

        $p=User::find($valor->id);
        $p->$campo=$valorcampo;
        $p->save();
        $this->dispatchBrowserEvent('notify', 'Usuario Actualizado.');
    }


    public function editar($valorId)
    {
        $user= User::find($valorId);
        return redirect()->route('users.edit',$user);
    }

    public function save()
    {
        $this->validate();

        User::create([
            'name'=>$this->valorcampo1,
            'email'=>$this->valorcampo2,
            'password'=>bcrypt($this->valorcampo3),
        ]);

        $this->dispatchBrowserEvent('notify', 'Usuario añadido con éxito');

        $this->emit('refresh');
        $this->valorcampo1='';
        $this->valorcampo2='';
        $this->valorcampo3='';
    }

    public function delete($valorId)
    {
        $borrar = User::find($valorId);

        if ($borrar) {
            $borrar->delete();
            $this->dispatchBrowserEvent('notify', 'Usuario eliminado!');
        }
    }
}
