<?php

namespace App\Http\Livewire\Seguridad;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Permisos extends Component
{
    use WithPagination;

    public $titulo='Permisos';
    public $valorcampo1='web';
    public $valorcampo2='';
    public $valorcampo3='';
    public $valorcampo4='';
    public $titcampo1='';
    public $titcampo2='Permiso';
    public $titcampo3='';
    public $titcampo4='';
    public $campo1='guarda';
    public $campo2='name';
    public $campo3='';
    public $campo4='';
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
    public $editarvisible=0;
    public $search='';

    protected $listeners = [ 'refresh' => '$refresh'];

    protected function rules()
    {
        return [
            'valorcampo2'=>'required|unique:permissions,name',
        ];
    }

    public function messages()
    {
        return [
            'valorcampo2.required' => 'El nombre del permiso es necesario',
            'valorcampo2.unique' => 'El permiso ya existe. Elige otro nombre para el permiso',
        ];
    }
    public function render()
    {
        $valores=Permission::query()
        ->search('name',$this->search)
        ->select('id','name as valorcampo2','guard_name as valorcampo1')
        ->orderBy('name')
        ->paginate(10);

        $campo4combo=Role::get();


        return view('livewire.auxiliarcard',compact('valores','campo4combo'));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeCampo(Permission $valor,$campo,$valorcampo)
    {
        $validator=Validator::make(['valorcampo'=>$valorcampo],[
            'valorcampo'=>'required|unique:permissions,name',
        ])->validate();

        $p=Permission::find($valor->id);
        $p->$campo=$valorcampo;
        $p->save();
        $this->dispatchBrowserEvent('notify', 'Permiso Actualizado.');
    }


    public function save()
    {
        $this->validate();

        Permission::create([
            'name'=>$this->valorcampo2,
            'guard_name'=>$this->valorcampo1,
        ]);

        $this->dispatchBrowserEvent('notify', 'Permiso añadido con éxito');

        $this->emit('refresh');
        $this->valorcampo2='';
        $this->valorcampo1='web';
    }

    public function delete($valorId)
    {
        $borrar = Permission::find($valorId);

        if ($borrar) {
            $borrar->delete();
            $this->dispatchBrowserEvent('notify', 'Permiso eliminado!');
        }
    }
}
