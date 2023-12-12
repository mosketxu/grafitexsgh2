<?php

namespace App\Http\Livewire\TiendaTipo;

use App\Models\TiendaTipo;
use Livewire\Component;
use Livewire\WithPagination;

class TiendaTipos extends Component
{
    use WithPagination;

    public $search='';

    public function render(){
        $tiendatipos=TiendaTipo::query()
        ->search('tiendatipo',$this->search)
        ->orderBy('tiendatipo','asc')
        ->get();

    return view('livewire.tienda-tipo.tienda-tipos',compact(['tiendatipos']));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeValor(TiendaTipo $tiendaTipo,$campo,$valor)
    {
        $tiendaTipo->update([$campo=>$valor]);
        $this->dispatchBrowserEvent('notify', 'Actuliazado con éxito.');
    }

    public function delete($tiendaTipoId)
    {
        $tiendaTipo = TiendaTipo::find($tiendaTipoId);
        if ($tiendaTipo ) {
            $tiendaTipo->delete();
            $this->dispatchBrowserEvent('notify', 'Tipo tienda '.$tiendaTipo->tiendaTipo.' ha sido eliminado!');
        }
    }

}
