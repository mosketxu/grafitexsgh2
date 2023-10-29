<?php

namespace App\Http\Livewire\Peticion;

use App\Models\Peticion;
use App\Models\PeticionEstado;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Peticiones extends Component
{

    use WithPagination;

    public $search='';
    public $filtroestado='';
    public $filtropeticionario='';


    public function render(){
        $peticiones=Peticion::query()
            ->search('id',$this->search)
            ->when($this->filtroestado!='', function ($query) {
                $query->where('estado', $this->filtroestado);
            })
            ->when($this->filtropeticionario!='', function ($query) {
                $query->where('peticionario_id', $this->filtropeticionario);
            })
            ->get();
        $estados=PeticionEstado::get();

        $peticionarios = User::role(['tienda','sgh'])->get();

        // orderBy('id')->get();
        if(Auth::user()->hasRole('tienda')){}
            $peticiones=$peticiones->where('peticionario_id',Auth::user()->id);

        return view('livewire.peticion.peticiones',compact('peticionarios','peticiones','estados'));
    }
}
