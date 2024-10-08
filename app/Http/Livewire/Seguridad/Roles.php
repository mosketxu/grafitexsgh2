<?php

namespace App\Http\Livewire\Seguridad;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

use Livewire\WithPagination;

class Roles extends Component
{
    use WithPagination;

    public $titulo='Roles';
    public $valorcampo1='web';
    public $valorcampo2='';
    public $valorcampo3='';
    public $valorcampo4='';
    public $titcampo1='';
    public $titcampo2='Rol';
    public $titcampo3='';
    public $titcampo4='';
    public $campo1='';
    public $campo2='name';
    public $campo3='';
    public $campo1visible=0;
    public $campo2visible=1;
    public $campo3visible=0;
    public $campo4visible=0;
    public $campo1disabled='';
    public $campo2disabled='';
    public $campo3disabled='';
    public $campo4disabled='';
    public $campo1fondo='bg-white';
    public $campo2fondo='bg-white';
    public $campo3fondo='bg-white';
    public $campo4fondo='bg-white';

    public $editarvisible=1;
    public $search='';

    protected $listeners = [ 'refresh' => '$refresh'];

    protected function rules()
    {
        return [
            'valorcampo2'=>'required|unique:roles,name',
        ];
    }
    public function messages()
    {
        return [
            'valorcampo2.required' => 'El nombre del rol es necesario',
            'valorcampo2.unique' => 'El rol ya existe. Elige otro nombre para el rol',
        ];
    }

    public function render()
    {
        $valores=Role::query()
            ->search('name',$this->search)
            ->select('id','name as valorcampo2','guard_name as valorcampo1')
            ->orderBy('name')
            ->paginate(10);

        $campo4combo=Role::get();

        return view('livewire.auxiliarcard',compact('valores','campo4combo'));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeCampo(Role $valor,$campo,$valorcampo)
    {
        Validator::make(['valorcampo'=>$valorcampo],[
            'valorcampo'=>'required|unique:roles,name',
        ])->validate();
        $p=Role::find($valor->id);
        $p->$campo=$valorcampo;
        $p->save();
        $this->dispatchBrowserEvent('notify', 'Role Actualizado.');
    }

    public function editar($valorId)
    {
        $role= Role::find($valorId);
        return redirect()->route('roles.edit',$role);
    }

    public function save()
    {
        $this->validate();

        Role::create([
            'name'=>$this->valorcampo2,
            'guard_name'=>$this->valorcampo1,
        ]);

        $this->dispatchBrowserEvent('notify', 'Role añadido con éxito');

        $this->emit('refresh');
        $this->valorcampo2='';
        $this->valorcampo1='web';
    }

    public function delete($valorId)
    {
        $borrar = Role::find($valorId);

        if ($borrar) {
            $borrar->delete();
            $this->dispatchBrowserEvent('notify', 'Role eliminado!');
        }
    }
}
