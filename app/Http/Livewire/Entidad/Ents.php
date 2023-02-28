<?php

namespace App\Http\Livewire\Entidad;

use App\Models\{Area, Entidad,User};
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

    public function render()
    {
        $entidades=Entidad::query()
            ->search('entidad',$this->search)
            ->search('provincia',$this->filtroprovincia)
            ->search('localidad',$this->filtrolocalidad)
            ->when($this->filtroarea!='', function ($query) {
                $query->where('area_id','=',$this->filtroarea);})
            ->orderBy('entidad','asc')
            ->get();

            $areas=Area::orderBy('area')->get();

        return view('livewire.entidad.ents',compact('entidades','areas'));
    }

    public function updatingSearch(){$this->resetPage();}
    public function updatingFiltroprovincia(){$this->resetPage();}
    public function updatingFiltrolocalidad(){$this->resetPage();}
    public function updatingFiltroarea(){$this->resetPage();}

    public function changeValor(Entidad $entidad,$campo,$valor)
    {
        $entidad->update([$campo=>$valor]);
        $this->dispatchBrowserEvent('notify', 'Actulizada con éxito.');
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
