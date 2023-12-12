<?php

namespace App\Http\Livewire\MontajeTipo;

use App\Models\MontajeTipo;
use Livewire\Component;
use Livewire\WithPagination;

class MontajeTipos extends Component
{
    use WithPagination;

    public $search='';

    public function render(){
        $montajetipos=MontajeTipo::query()
        ->search('montajetipo',$this->search)
        ->orderBy('montajetipo','asc')
        ->get();

    return view('livewire.montaje-tipo.montaje-tipos',compact(['montajetipos']));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeValor(MontajeTipo $montajetipo,$campo,$valor)
    {
        $montajetipo->update([$campo=>$valor]);
        $this->dispatchBrowserEvent('notify', 'Actulizado con éxito.');
    }

    public function delete($montajetipoId)
    {
        $montajetipo = MontajeTipo::find($montajetipoId);
        if ($montajetipo ) {
            $montajetipo->delete();
            $this->dispatchBrowserEvent('notify', 'Tipo montaje '.$montajetipo->montajetipo.' ha sido eliminado!');
        }
    }
}
