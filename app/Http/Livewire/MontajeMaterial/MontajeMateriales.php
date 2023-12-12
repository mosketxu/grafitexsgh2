<?php

namespace App\Http\Livewire\MontajeMaterial;

use App\Models\MontajeMaterial;
use Livewire\Component;
use Livewire\WithPagination;

class MontajeMateriales extends Component
{
    use WithPagination;

    public $search='';

    public function render(){
        $montajemateriales=MontajeMaterial::query()
        ->search('montajematerial',$this->search)
        ->orderBy('montajematerial','asc')
        ->get();

    return view('livewire.montaje-material.montaje-materiales',compact(['montajemateriales']));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeValor(MontajeMaterial $montajematerial,$campo,$valor)
    {
        $montajematerial->update([$campo=>$valor]);
        $this->dispatchBrowserEvent('notify', 'Actualizado con éxito.');
    }

    public function delete($montajematerialId)
    {
        $montajematerial = MontajeMaterial::find($montajematerialId);
        if ($montajematerial ) {
            $montajematerial->delete();
            $this->dispatchBrowserEvent('notify', 'Tipo material montaje '.$montajematerial->montajematerial.' ha sido eliminado!');
        }
    }
}
