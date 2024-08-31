<?php

namespace App\Http\Livewire\Marca;

use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;


class Marcas extends Component
{
    use WithPagination;

    public $search='';


    public function render(){

        $marcas=Marca::query()
        ->search('marcaname',$this->search)
        ->orderBy('marcaname')
        ->get();
        return view('livewire.marca.marcas',compact('marcas'));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeValor(Marca $marca,$campo,$valor)
    {
        $marca->update([$campo=>$valor]);
        $this->dispatchBrowserEvent('notify', 'Actualizado con éxito.');
    }

    public function delete($marcaId)
    {
        $marca = Marca::find($marcaId);
        if ($marca ) {
            $marca->delete();
            $this->dispatchBrowserEvent('notify', 'Marca eliminada');
        }
    }
}
