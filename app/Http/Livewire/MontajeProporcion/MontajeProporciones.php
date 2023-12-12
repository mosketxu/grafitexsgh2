<?php

namespace App\Http\Livewire\MontajeProporcion;

use App\Models\MontajeProporcion;
use Livewire\Component;
use Livewire\WithPagination;

class MontajeProporciones extends Component
{
    use WithPagination;

    public $search='';

    public function render(){
        $montajeproporciones=MontajeProporcion::query()
        ->search('montajeproporcion',$this->search)
        ->orderBy('montajeproporcion','asc')
        ->get();

    return view('livewire.montaje-proporcion.montaje-proporciones',compact(['montajeproporciones']));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeValor(MontajeProporcion $montajeproporcion,$campo,$valor)
    {
        $montajeproporcion->update([$campo=>$valor]);
        $this->dispatchBrowserEvent('notify', 'Actualizado con éxito.');
    }

    public function delete($montajeproporcionId)
    {
        $montajeproporcion = MontajeProporcion::find($montajeproporcionId);
        if ($montajeproporcion ) {
            $montajeproporcion->delete();
            $this->dispatchBrowserEvent('notify', 'Tipo proporcion montaje '.$montajeproporcion->montajeproporcion.' ha sido eliminado!');
        }
    }
}
