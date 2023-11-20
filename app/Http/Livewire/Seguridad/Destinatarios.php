<?php

namespace App\Http\Livewire\Seguridad;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Destinatario;

class Destinatarios extends Component
{

    use WithPagination;

    public $titulo='Destinatarios Mail';
    public $valorcampo1='';
    public $valorcampo2='';
    public $valorcampo3='';
    public $titcampo1='Nombre';
    public $titcampo2='Email';
    public $titcampo3='Empresa';
    public $campo1='name';
    public $campo2='mail';
    public $campo3='empresa';
    public $campo1visible=1;
    public $campo2visible=1;
    public $campo3visible=1;
    public $editarvisible=0;
    public $search='';

    protected $listeners = [ 'refresh' => '$refresh'];

    protected function rules()
    {
        return [
            'valorcampo1'=>'required|unique:destinatarios,name',
            'valorcampo2'=>'email|required|unique:destinatarios,mail',
            'valorcampo3'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'valorcampo1.required' => 'El nombre del usuario es necesario',
            'valorcampo1.unique' => 'El nombre del usuario ya existe',
            'valorcampo2.required' => 'El mail es necesario.',
            'valorcampo2.email' => 'El mail debe ser válido.',
            'valorcampo2.unique' => 'El mail ya existe.',
            'valorcampo3.requiered' => 'La empresa en necesaria.',

        ];
    }

    public function render(){
        $valores=Destinatario::query()
            ->search('name',$this->search)
            ->orSearch('mail',$this->search)
            ->select('id','name as valorcampo1','mail as valorcampo2','empresa as valorcampo3')
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.auxiliarcard',compact('valores'));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeCampo(Destinatario $valor,$campo,$valorcampo)
    {
        Validator::make(['valorcampo'=>$valorcampo],[
            'valorcampo'=>'required',
        ])->validate();

        $p=Destinatario::find($valor->id);
        $p->$campo=$valorcampo;
        $p->save();
        $this->dispatchBrowserEvent('notify', 'Destinatario Actualizado.');
    }

    public function save()
    {
        $this->validate();

        Destinatario::create([
            'name'=>$this->valorcampo1,
            'mail'=>$this->valorcampo2,
            'empresa'=>$this->valorcampo3,
        ]);

        $this->dispatchBrowserEvent('notify', 'Destinatario añadido con éxito');

        $this->emit('refresh');
        $this->valorcampo1='';
        $this->valorcampo2='';
        $this->valorcampo3='';
    }

    public function delete($valorId)
    {
        $borrar = Destinatario::find($valorId);

        if ($borrar) {
            $borrar->delete();
            $this->dispatchBrowserEvent('notify', 'Destinatario eliminado!');
        }
    }


}
