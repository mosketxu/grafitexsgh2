<?php

namespace App\Http\Livewire\Seguridad;

use App\Models\Configuracion as ModelsConfiguracion;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;


class Configuracion extends Component
{
    use WithPagination;

    public $titulo='Configuraciones';
    public $valorcampo1='';
    public $valorcampo2='';
    public $valorcampo3='0';
    public $valorcampo4='';
    public $titcampo1='Nombre';
    public $titcampo2='Familia';
    public $titcampo3='Descripcion';
    public $titcampo4='Valor';
    public $campo1='name';
    public $campo2='familia';
    public $campo3='descripcion';
    public $campo4='valor';
    public $campo1visible=1;
    public $campo2visible=1;
    public $campo3visible=1;
    public $campo4visible=1;
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
            'valorcampo1'=>'required',
            'valorcampo2'=>'nullable',
            'valorcampo3'=>'nullable',
            'valorcampo4'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'valorcampo1.required' => 'El nombre es necesario',
            'valorcampo2.unique' => 'El mail ya existe.',
            'valorcampo3.required' => 'La valor necesario.',
            'valorcampo3.numeric' => 'El valor debe ser un número.',

        ];
    }
    public function render(){
        $valores=ModelsConfiguracion::query()
        ->search('name',$this->search)
        ->orSearch('familia',$this->search)
        ->select('id','name as valorcampo1','familia as valorcampo2','descripcion as valorcampo3','valor as valorcampo4')
        ->orderBy('familia')
        ->orderBy('name')
        ->paginate(10);

        return view('livewire.auxiliarcard',compact('valores'));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeCampo(ModelsConfiguracion $valor,$campo,$valorcampo)
    {
        Validator::make(['valorcampo'=>$valorcampo],[
            'valorcampo'=>'required',
        ])->validate();

        $p=ModelsConfiguracion::find($valor->id);
        $p->$campo=$valorcampo;
        $p->save();
        $this->dispatchBrowserEvent('notify', 'Actualizado.');
    }

    public function save()
    {
        $this->validate();

        ModelsConfiguracion::create([
            'name'=>$this->valorcampo1,
            'familia'=>$this->valorcampo2,
            'descripcion'=>$this->valorcampo3,
            'valor'=>$this->valorcampo4,
        ]);

        $this->dispatchBrowserEvent('notify', 'Añadido con éxito');

        $this->emit('refresh');
        $this->valorcampo1='';
        $this->valorcampo2='';
        $this->valorcampo3='';
        $this->valorcampo4='0';
    }

    public function delete($valorId)
    {
        $borrar = ModelsConfiguracion::find($valorId);

        if ($borrar) {
            $borrar->delete();
            $this->dispatchBrowserEvent('notify', 'Eliminado!');
        }
    }


}
