<?php

namespace App\Http\Livewire\Entidad;

use App\Models\{Area, Entidad, Provincia, User};
use Livewire\Component;
use Livewire\WithPagination;

class Ents extends Component
{
    use WithPagination;

    public $search='';
    public $filtrolocalidad='';
    public $filtroprovincia='';
    public $filtroarea='';

    public Entidad $entidad;

    public function render(){
        $entidades=Entidad::query()
            ->with('entidadareas')
            ->search('entidad',$this->search)
            ->search('provincia',$this->filtroprovincia)
            ->search('localidad',$this->filtrolocalidad)
            ->when($this->filtroarea!='', function ($query) {
                $query->whereHas('entidadareas',function($query){
                    $query->where('area_id', $this->filtroarea);
                });})
            ->where('montador','1')
            ->orderBy('entidad','asc')
            ->get();

            $areas=Area::orderBy('area')->get();
            $provincias=Provincia::orderBy('provincia')->get();

        return view('livewire.entidad.ents',compact('entidades','areas','provincias'));
    }

    public function updatingSearch(){$this->resetPage();}
    public function updatingFiltroprovincia(){$this->resetPage();}
    public function updatingFiltrolocalidad(){$this->resetPage();}
    public function updatingFiltroarea(){$this->resetPage();}

    public function changeValor(Entidad $entidad,$campo,$valor)
    {
        $entidad->update([$campo=>$valor]);
        $this->dispatchBrowserEvent('notify', 'Actuliazada con éxito.');
    }

    public function delete($entidadId)
    {
        $entidad = Entidad::find($entidadId);
        if ($entidad) {
            $entidad->delete();
            $this->dispatchBrowserEvent('notify', 'La entidad: '.$entidad->entidad.' ha sido eliminada!');
        }
    }
}
