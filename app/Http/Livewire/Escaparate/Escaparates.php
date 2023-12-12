<?php

namespace App\Http\Livewire\Escaparate;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Escaparate;

class Escaparates extends Component
{
    use WithPagination;

    public $search='';

    public function render(){
        $escaparates=Escaparate::query()
        ->search('escaparate',$this->search)
        ->orderBy('escaparate','asc')
        ->get();

    return view('livewire.escaparate.escaparates',compact(['escaparates']));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeValor(Escaparate $escaparate,$campo,$valor)
    {
        $escaparate->update([$campo=>$valor]);
        $this->dispatchBrowserEvent('notify', 'Actualizado con éxito.');
    }

    public function delete($escaparateId)
    {
        $escaparate = Escaparate::find($escaparateId);
        if ($escaparate ) {
            $escaparate->delete();
            $this->dispatchBrowserEvent('notify', 'Escaparate '.$escaparate->escaparate.' ha sido eliminado!');
        }
    }
}
